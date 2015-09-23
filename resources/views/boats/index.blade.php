@extends('layouts.master')
@section('content')
    <h2>Boats</h2>

    <a href="{{ url('boats/new') }}">New boat</a>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($boats as $boat)
            <tr>
                <td>{{ $boat->id }}</td>
                <td>{{ $boat->name }}</td>
                <td><a href="{{ url('boats/edit/' . $boat->id) }}">Edit boat</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
@stop