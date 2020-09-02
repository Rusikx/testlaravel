@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Payment</h2>
            </div>
        </div>
    </div>
    <br/><br/>

    <div class="row justify-content-center">
        <div class="col-lg-12 margin-tb">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('payments.validation', ['payment' => $payment->id]) }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>User: {{ $payment->user->fullName }}</strong>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Num card:</strong>
                            <input id="num" class="form-control" type="text" name="num" placeholder="0123 4567 8910 1112"></input>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Expires:</strong>
                            <input id="expires" class="form-control" type="text" name="expires" placeholder="01/12"></input>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>CVC:</strong>
                            <input id="cvc" class="form-control" type="text" name="cvc" placeholder="123"></input>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Pay</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@push('footer_scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $("#num").inputmask({"mask": "9999 9999 9999 9999"});
            $("#expires").inputmask({"mask": "99/99"});
            $("#cvc").inputmask({"mask": "999"});
        });
    </script>
@endpush

@endsection
