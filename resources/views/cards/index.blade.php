@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">Cards</div>
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('cards.create') }}"> Add</a>
                    </div>
                </div>

                @if($cards)
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>User Name</th>
                            <th>Card</th>
                            <th width="280px">Action</th>
                        </tr>
                        @foreach($cards as $i => $card)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $card->user->fullName }}</td>
                            <td>{{ $card->cardNum }}</td>
                            <td>
                                <form action="{{ route('cards.destroy', $card->id) }}" method="POST">

                                    <a class="btn btn-info" href="{{ route('cards.show', $card->id) }}">Show</a>

                                    <a class="btn btn-primary" href="{{ route('cards.edit', $card->id) }}">Edit</a>

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    {{ $cards->links() }}
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
