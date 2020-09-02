@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">Payments</div>
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('payments.create') }}"> Add</a>
                    </div>
                </div>

                @if($payments)
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>User Name</th>
                            <th>Card</th>
                            <th>Sum</th>
                            <th>Status</th>
                            <th width="300px">Action</th>
                        </tr>
                        @foreach($payments as $i => $payment)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $payment->user->fullName }}</td>
                            <td>{{ $payment->card->cardNum }}</td>
                            <td>{{ $payment->sum }}</td>
                            <td>{{ $payment->statusText }}</td>
                            <td>
                                <a class="btn btn-info" href="{{ route('payments.show', $payment->id) }}">Show</a>
                                @if($payment->status === 0 && empty($payment->payment_at))
                                    <button
                                        class="btn btn-success copyPathBuffer"
                                        href="{{ route('payments.payment', [
                                            'payment' => $payment->id,
                                            'code' => $payment->code
                                       ]) }}"
                                    >Copy path for payment</button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    {{ $payments->links() }}
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@push('footer_scripts')
    <script type="text/javascript">
        $(function() {
            $('.copyPathBuffer').on('click', function(e) {
                e.preventDefault();

                var input = document.body.appendChild(document.createElement("input"));
                input.value = $(this).attr("href");
                input.focus();
                input.select();
                document.execCommand('copy');

                input.parentNode.removeChild(input);
            });
        });
    </script>
@endpush