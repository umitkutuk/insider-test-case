@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-6">
            <h2>Seasons</h2>
            <p>Season List</p>
        </div>

        <div class="col-6">
            <a href="{{ route('seasons.create') }}" class="float-right btn btn-lg btn-info">Create New Season</a>
        </div>
    </div>
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
            @foreach ($seasons as $season)
                <tr>
                    <td>{{ $season->id }}</td>
                    <td>{{ $season->name }}</td>
                    <td>{{ $season->starts_at }}</td>
                    <td>{{ $season->ends_at }}</td>
                    <td>{{ $season->season }}</td>
                    <td>{{ $season->league_id }}</td>
                    <td>{{ $season->is_active ? 'Aktif' : ' ' }}</td>
                    <td>
                        @if( !$season->is_active)
                            <button class="btn btn-danger" id="season-active" data-id="{{ $season->id }}">Activate</button>
                        @else

                        @endif
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
</div>
@endsection
@section('scripts')
    <script>
        $( document ).ready(function() {
            $( "#season-active" ).on( "click", function() {
                $.ajax({
                    type: 'POST',
                    url: "{{ route('seasons.set-active') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": $( this ).data('id'),
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
