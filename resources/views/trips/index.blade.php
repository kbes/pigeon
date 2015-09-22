@extends('layouts.master')
@section('content')

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Boat</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($trips as $trip)
        <tr>
            <td>{{ $trip->id }}</td>
            <td>{{ $trip->boat->name }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop