@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Fail success</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('payments.index') }}"> Back</a>
            </div>
        </div>
    </div>
</div>
@endsection