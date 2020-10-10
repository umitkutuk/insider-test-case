@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-6">
            <h2>Fixtures</h2>
            <p>Fixture List</p>
        </div>
    </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Season</th>
                <th>League</th>
                <th>Team 1</th>
                <th>Team 2</th>
                <th>Home Team</th>
                <th>Week</th>
                <th>Order</th>
                <th>Starts At</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($fixtures as $fixture)
                <tr>
                    <td>{{ $fixture->id }}</td>
                    <td>{{ $fixture->season->name }}</td>
                    <td>{{ $fixture->league->name }}</td>
                    <td>{{ $fixture->team1->name }}</td>
                    <td>{{ $fixture->team2->name }}</td>
                    <td>{{ $fixture->homeTeam->name }}</td>
                    <td>{{ $fixture->week }}</td>
                    <td>{{ $fixture->order }}</td>
                    <td>{{ $fixture->starts_at }}</td>
                </tr>
            @endforeach

            </tbody>
        </table>
</div>
@endsection
