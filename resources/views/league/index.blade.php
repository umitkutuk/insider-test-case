@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-6">
            <h2>Leagues</h2>
            <p>League List</p>
        </div>

        <div class="col-6">
            <a href="{{ route('leagues.create') }}" class="float-right btn btn-lg btn-info">Create New League</a>
        </div>
    </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($leagues as $league)
                <tr>
                    <td>{{ $league->id }}</td>
                    <td>{{ $league->name }}</td>
                </tr>
            @endforeach

            </tbody>
        </table>
</div>
@endsection
