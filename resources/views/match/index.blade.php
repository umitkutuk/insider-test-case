@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-6">
            <h2>Matches</h2>
            <p>Match List</p>
        </div>
    </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Season</th>
                <th>League</th>
                <th>Team 1</th>
                <th>Team 1 Goal</th>
                <th>Team 2</th>
                <th>Team 2 Goal</th>
                <th>Winner</th>
                <th>Starts At</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($matches as $match)
                <tr>
                    <td>{{ $match->id }}</td>
                    <td>{{ $match->seaoson_id }}</td>
                    <td>{{ $match->league_id }}</td>
                    <td>{{ $match->team_1 }}</td>
                    <td>{{ $match->team_1_goal }}</td>
                    <td>{{ $match->team_2 }}</td>
                    <td>{{ $match->team_2_goal }}</td>
                    <td>{{ $match->winner_id }}</td>
                    <td>{{ $match->starts_at }}</td>
                </tr>
            @endforeach

            </tbody>
        </table>
</div>
@endsection
