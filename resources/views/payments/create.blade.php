@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Payment</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('payments.index') }}"> Back</a>
                <a class="btn btn-primary" href="{{ route('cards.create') }}"> Add Card</a>
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

            <form action="{{ route('payments.store') }}" method="POST">
                @csrf

                <div class="row">
                    @if(isset($cards) && count($cards))
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Card:</strong>
                                <select class="form-control" id="card_id" name="card_id" multiple>
                                    @foreach($cards as $card)
                                        <option value="{{ $card->id }}">{{ $card->fullName }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Sum:</strong>
                                <input class="form-control" type="number" name="sum" step="0.01" placeholder="500.00"></input>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Bill</button>
                        </div>
                    @else
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Cards not found</strong>
                            </div>
                        </div>
                    @endif
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
