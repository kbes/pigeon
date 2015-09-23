@extends('layouts.master')
@section('content')
    <h2>Cargo</h2>

    <h3>Categories</h3>
    <a href="#">New category</a>
    <ul>
        <li>
            <a href="#">All</a>
        </li>
        @foreach ($categories as $category)
            <li>
                <a href="">
                    {{ $category->name }}
                </a>
            </li>
        @endforeach
    </ul>

    <h3>All</h3>
    <a href="#">Edit category</a>
    <a href="#">New item</a>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($allCargo as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->category->name }}</td>
                <td><a href="{{ url('cargo/edit/' . $item->id) }}">Edit item</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <form>
        <h2>Edit category</h2>
        <label for="name">Name</label>
        <input type="text" id="name">
    </form>
    <a href="#">Delete</a>
    <a href="#">Save</a>

    <form>
        <h2>Edit item</h2>
        <label for="name">Name</label>
        <input type="text" id="name">
        <label for="width">Width</label>
        <input type="text" id="width">
        <label for="length">Length</label>
        <input type="text" id="length">
        <label for="category">Category</label>
        <select id="category">
            @foreach($categories as $category)
                <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
            @endforeach
        </select>
    </form>
    <a href="#">Delete</a>
    <a href="#">Save</a>

    <form>
        <h2>New category</h2>
        <label for="name">Name</label>
        <input type="text" id="name">
    </form>
    <a href="#">Save</a>

    <form>
        <h2>New item</h2>
        <label for="name">Name</label>
        <input type="text" id="name">
        <label for="width">Width</label>
        <input type="text" id="width">
        <label for="length">Length</label>
        <input type="text" id="length">
        <label for="category">Category</label>
        <select id="category">
            @foreach($categories as $category)
                <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
            @endforeach
        </select>
    </form>
    <a href="#">Save</a>
@stop