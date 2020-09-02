<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Card;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Responseconfig/app.php
     */
    public function index()
    {
        $payments = Payment::orderByDesc('created_at')->paginate(10);

        return view('payments.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $cards = Card::all();

        return view('payments.create', compact('users', 'cards'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'card_id' => 'required',
            'sum' => 'required|between:0,99.99',
        ]);
        $data = $request->all();
        if ($card = Card::find($data['card_id'])) {
            $user_id = $card->user_id;
        }
        $data['code'] = md5($user_id . time());
        $data['user_id'] = $user_id;

        $payment = Payment::create($data);

        return redirect()->route('payments.show', $payment);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        return view('payments.show', compact('payment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        return view('payments.edit', compact('payment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        $payment = Payment::update($request->all());

        return redirect()->route('payments.show', $payment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        $payment->delete();

        return redirect()->route('payments.index');
    }

    public function success(Payment $payment)
    {
        $payment->update([
            'status' => Payment::STATUS_SUCCESS,
            'payment_at' => time(),
        ]);

        return redirect()->back();
    }

    public function fail(Payment $payment)
    {
        $payment->update(['status' => Payment::STATUS_FAIL]);

        return redirect()->back();
    }

    public function payment(Payment $payment, $code)
    {
        if ($payment->code === $code && empty($payment->payment_at))
            return view('payments.process', compact('payment', 'code'));

        return abort(404);
    }

    public function validation(Request $request)
    {
        $request->validate([
            'num' => 'required|ccn',
            'expires' => 'required|ccd',
            'cvc' => 'required|cvc',
        ]);
        $data = $request->all();
        $payment = Payment::where('code', $data['code'])->first();

        // if (moon($data)) { // TODO algorithm moon

        $payment->update([
            'status' => Payment::STATUS_SUCCESS,
            'payment_at' => time(),
        ]);

        $data['user_id'] = $payment['user_id'];
        $data['num'] = str_replace(' ', '', $request->num);

        $card = Card::create($data);

        return route('payments.success');
        // } else {
//            $payment->update([
//                'status' => Payment::STATUS_FAIL,
//            ]);

//            return route('payments.fail');
//        }
    }
}
