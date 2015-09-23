@extends('layouts.master')
@section('content')
    <div class="trips">
        <h2>Trips</h2>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="id">ID</th>
                    <th class="boat">Boat</th>
                    <th class="base">Base</th>
                    <th class="route">Route</th>
                    <th class="updated">Last updated</th>
                    <th class="view">View</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($trips as $trip)
                <tr>
                    <td class="id">{{ $trip->id }}</td>
                    <td class="boat">{{ $trip->boat->name }}</td>
                    <td class="base">{{ $trip->route->first()->subdestination->name }}</td>
                    <td class="route">
                        @foreach($trip->route as $i => $subdestination)
                            @if ($i != 0)
                                    {{ $subdestination->subdestination->name }}
                                @if ($i != sizeof($trip->route)-1)
                                    -
                                @endif
                            @endif
                        @endforeach
                    </td>
                    <td class="updated">{{ $trip->updated_at }}</td>
                    <td class="view"><a href="{{ url('boats/' . $trip->boat->id) }}">View deck</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop