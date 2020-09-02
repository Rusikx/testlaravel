@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2> Show Payment</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('payments.index') }}"> Back</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>User Name:</strong>
                    {{ $payment->user->fullName }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Sum:</strong>
                    {{ $payment->sum }}
                </div>
            </div>
        </div>
    </div>
@endsection
