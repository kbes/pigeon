@extends('layouts.master')
@section('content')

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Category</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($allCargo as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->category->name }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop