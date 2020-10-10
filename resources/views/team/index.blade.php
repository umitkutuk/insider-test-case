@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-6">
            <h2>Teams</h2>
            <p>Team List</p>
        </div>
    </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Score</th>
                <th>Total Score</th>
                <th>Match Count</th>
                <th>Total Positive Goal</th>
                <th>Total Negative Goal</th>
                <th>Goal Average</th>
                <th>League</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($teams as $team)
                <tr>
                    <td>{{ $team->id }}</td>
                    <td>{{ $team->name }}</td>
                    <td>{{ $team->score }}</td>
                    <td>{{ $team->total_score }}</td>
                    <td>{{ $team->match_count }}</td>
                    <td>{{ $team->total_positive_goal }}</td>
                    <td>{{ $team->total_negative_goal }}</td>
                    <td>{{ $team->goal_average }}</td>
                    <td>{{ $team->league_id }}</td>
                </tr>
            @endforeach

            </tbody>
        </table>
</div>
@endsection
