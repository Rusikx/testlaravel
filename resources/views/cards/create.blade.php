@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Card</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('cards.index') }}"> Back</a>
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

            <form action="{{ route('cards.store') }}" method="POST">
                @csrf

                <div class="row">
                    @if(isset($users) && count($users))
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>User:</strong>
                                <select class="form-control" id="user_id" name="user_id" multiple>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->fullName }}</option>
                                    @endforeach
                                </select>
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
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    @else
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Users not found</strong>
                            </div>
                        </div>
                    @endif
                </div>

            </form>
        </div>
    </div>
</div>
@push('footer_scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $("#num").inputmask({"mask": "9999 9999 9999 9999"});
            $("#expires").inputmask({
                mask: "99/99",
                // alias: 'datetime',
                // inputFormat: 'mm/yy',
                // min: '08/19',
                // max: '01/30'
            });
            $("#cvc").inputmask({"mask": "999"});
        });
    </script>
@endpush

@endsection
