@extends('layouts.master')
@section('content')
    <div class="cargo">
        <h2>Cargo</h2>

        <div class="row">
            <div class="col-sm-3">
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
            </div>

            <div class="col-sm-9">
                <span class="category-title">
                    <h4>All</h4>
                </span>
                <span class="category-actions">
                    <a href="#">Edit category</a>
                    <a href="#">New item</a>
                </span>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="id">ID</th>
                            <th class="name">Name</th>
                            <th class="edit">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allCargo as $item)
                        <tr>
                            <td class="id">{{ $item->id }}</td>
                            <td class="name">{{ $item->category->name }}</td>
                            <td class="edit"><a href="{{ url('cargo/edit/' . $item->id) }}">Edit item</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <form class="hide">
            <h2>Edit category</h2>
            <label for="name">Name</label>
            <input type="text" id="name">
            <a href="#">Delete</a>
            <a href="#">Save</a>
        </form>

        <form class="hide">
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
            <a href="#">Delete</a>
            <a href="#">Save</a>
        </form>

        <form class="hide">
            <h2>New category</h2>
            <label for="name">Name</label>
            <input type="text" id="name">
            <a href="#">Save</a>
        </form>

        <form class="hide">
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
            <a href="#">Save</a>
        </form>
    </div>
@stop
