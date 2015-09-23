@extends('layouts.master')
@section('content')
    <h2>Trips</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Boat</th>
                <th>Base</th>
                <th>Route</th>
                <th>Last updated</th>
                <th>View</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($trips as $trip)
            <tr>
                <td>{{ $trip->id }}</td>
                <td>{{ $trip->boat->name }}</td>
                <td>{{ $trip->route->first()->subdestination_id }}</td>
                <td class="no-whitespace">
                    @foreach($trip->route as $i => $subdestination)
                        @if ($i != 0)
                                {{ $subdestination->subdestination->name }}
                            @if ($i != sizeof($trip->route)-1)
                                -
                            @endif
                        @endif
                    @endforeach
                </td>
                <td>{{ $trip->updated_at }}</td>
                <td><a href="{{ url('boats/' . $trip->boat->id) }}">View deck</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
@stop