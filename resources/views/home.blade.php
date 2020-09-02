@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Users</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if($users)
                        <table class="table table-bordered">
                            <tr>
                                <th>No</th>
                                <th>User Name</th>
                                <th>Count cards</th>
                            </tr>
                            @foreach($users as $i => $user)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $user->fullName }}</td>
                                    <td>{{ count($user->cards) }}</td>
                                </tr>
                            @endforeach
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
