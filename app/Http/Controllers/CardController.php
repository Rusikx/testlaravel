<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\User;
use Illuminate\Http\Request;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cards = Card::orderByDesc('created_at')->paginate(10);

        return view('cards.index', compact('cards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();

        return view('cards.create', compact('users'));
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
            'user_id' => 'required',
            'num' => 'required|ccn',
            'expires' => 'required|ccd',
            'cvc' => 'required|cvc',
        ]);
        $requestData = $request->all();
        $requestData['num'] = str_replace(' ', '', $request->num);
        $request->replace($requestData);

        $card = Card::create($request->all());

        return redirect()->route('cards.show', $card);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function show(Card $card)
    {
        return view('cards.show', compact('card'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function edit(Card $card)
    {
        $users = User::all();

        return view('cards.edit', compact('card', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Card $card)
    {
        $request->validate([
            'user_id' => 'required',
            'num' => 'required|ccn',
            'expires' => 'required|ccd',
            'cvc' => 'required|cvc',
        ]);

        $card = Card::update($request->all());

        return redirect()->route('cards.show', $card);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function destroy(Card $card)
    {
        $card->delete();

        return redirect()->route('cards.index');
    }
}
