@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="row">
                    <div class="col-6">
                        <h2>Seasons</h2>
                        <p>Season List</p>
                    </div>
                    <div class="col-6">
                        <div class="float-right">
                            <button class="btn btn-danger" id="play-all">Play All Week</button>
                            <button class="btn btn-warning" id="play-one">Play One Week</button>
                        </div>
                    </div>
                </div>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Team</th>
                        <th>Season</th>
                        <th>League</th>
                        <th>score</th>
                        <th>Goal (+)</th>
                        <th>Goal (-)</th>
                        <th>Average</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($scores as $score)
                        <tr>
                            <td>{{ $score->team->name }}</td>
                            <td>{{ $score->season->name }}</td>
                            <td>{{ $score->league->name }}</td>
                            <td>{{ $score->score }}</td>
                            <td>{{ $score->total_positive_goal }}</td>
                            <td>{{ $score->total_negative_goal }}</td>
                            <td>{{ $score->goal_average }}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
            <div class="col-6">
                <div class="row">
                    <div class="col-6">
                        <h2>Plays</h2>
                        <p>Plat Screen</p>
                    </div>
                </div>
                <div id="play">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Starts At</th>
                            <th>Ends At</th>
                            <th>Season</th>
                            <th>League</th>
                            <th>Active</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($scores as $score)
                            <tr>
                                <td>{{ $score->team->name }}</td>
                                <td>{{ $score->season->name }}</td>
                                <td>{{ $score->league->name }}</td>
                                <td>{{ $score->score }}</td>
                                <td>{{ $score->league_id }}</td>
                                <td>{{ $score->total_positive_goal }}</td>
                                <td>{{ $score->total_negative_goal }}</td>
                                <td>{{ $score->goal_average }}</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                <div/>
            <div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $( document ).ready(function() {
            $( "#play-one" ).on( "click", function() {
                $.ajax({
                    type: 'POST',
                    url: "{{ route('plays.play-one') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(resultData) {
                        alert(resultData)
                        location.reload();
                    }
                });
            });
            $( "#play-all" ).on( "click", function() {
                $.ajax({
                    type: 'POST',
                    url: "{{ route('plays.play-all') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(resultData) {
                        alert(resultData)
                        location.reload();
                    }
                });
            });
        });
    </script>
@endsection
