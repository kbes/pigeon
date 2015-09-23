@extends('layouts.master')
@section('content')
    <h2>Overview</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Width</th>
                <th>Length</th>
                <th>Trips</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($boats as $boat)
            <tr>
                <td>{{ $boat->id }}</td>
                <td>{{ $boat->name }}</td>
                <td>{{ $boat->width }}</td>
                <td>{{ $boat->length }}</td>
                <td>
                    @foreach($boat->trips as $trip)
                        {{ $trip->id }}
                    @endforeach
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@stop