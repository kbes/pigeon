@extends('layouts.master')
@section('content')
    <div class="cargo">
        <h2>Cargo</h2>

        <div class="row">
            <div class="col-sm-3">
                <h3>Categories</h3>

                <ul class="category-list">
                    <li>
                        <a href="#" class="active">All</a>
                    </li>
                    @foreach ($categories as $category)
                        <li>
                            <a href="#">{{ $category->name }}</a>
                        </li>
                    @endforeach
                </ul>
                <button>New category</button>
            </div>

            <div class="col-sm-9" id="items">
                <span class="category-title">
                    <h3>Items</h3>
                </span>
                <span class="category-actions">
                    <button>Edit category</button>
                    <button class="new-item-button">New item</button>
                </span>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="id">ID</th>
                            <th class="category hide">Category</th>
                            <th class="name">Name</th>
                            <th class="edit">Edit</th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        @foreach ($allCargo as $item)
                        <tr>
                            <td class="id">{{ $item->id }}</td>
                            <td class="category hide">{{ $item->category->name }}</td>
                            <td class="name">{{ $item->name }}</td>
                            <td class="edit"><a href="{{ url('cargo/edit/' . $item->id) }}">Edit item</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div id="edit-category" class="form-fields modal-box hide">
            <form>
                <h2>Edit category</h2>
                <label for="name">Name</label>
                <input type="text" id="name">
                <button>Delete</button>
                <button>Save</button>
            </form>
        </div>

        <div id="edit-item" class="form-fields hide">
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
                <button>Delete</button>
                <button>Save</button>
            </form>
        </div>

        <div id="new-category" class="form-fields hide">
            <form>
                <h2>New category</h2>
                <label for="name">Name</label>
                <input type="text" id="name">
                <button>Save</button>
            </form>
        </div>

        <div class="new-item form-fields modal-box mfp-hide">
            <form>
                <div class="modal-header">
                    <h2>New item</h2>
                </div>
                <div class="">
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
                </div>
                <div class="modal-footer">
                    <button class="cancel">Cancel</button>
                    <button class="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
@stop
