@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container">
        <h2>Tournaments</h2>
        <p>Tournament List</p>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Plan</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($data['competitions'] as $d)
                <tr>
                    <td>{{ $d['id'] }}</td>
                    <td>{{ $d['name'] }}</td>
                    <td>{{ $d['plan'] }}</td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
@endsection
