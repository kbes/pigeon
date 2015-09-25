@extends('layouts.master')
@section('content')
    <div class="boats">
        <h2 class="boats-title">Boats</h2>

        <button class="btn new-boat">New boat</button>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="id">ID</th>
                    <th class="name">Name</th>
                    <th class="edit">Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($boats as $boat)
                <tr>
                    <td class="id">{{ $boat->id }}</td>
                    <td class="name">{{ $boat->name }}</td>
                    <td class="edit"><button class="btn" data-function="{{ url('boats/edit/' . $boat->id) }}">Edit boat</button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop