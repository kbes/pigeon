@extends('layouts.master')
@section('content')
    @include('mst_templates.new_item_row')

    <div class="cargo" data-scope="CargoCtrl">
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
                            <a href="#" data-id="{{ $category->id }}">{{ $category->name }}</a>
                        </li>
                    @endforeach
                </ul>
                <button class="btn" data-function="newCategory()">New category</button>
            </div>

            <div class="col-sm-9" id="items">
                <span class="category-title">
                    <h3>Items</h3>
                </span>
                <span class="category-actions">
                    <button class="btn edit-category-button hide" data-function="editCategory()">Edit category</button>
                    <button class="btn new-item-button" data-function="newItem()">New item</button>
                </span>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="id">ID</th>
                            <th class="category hide">Category</th>
                            <th class="name">Name</th>
                            <th class="edit"></th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        @foreach ($allCargo as $item)
                        <tr data-id="{{ $item->id }}">
                            <td class="id">{{ $item->id }}</td>
                            <td class="category hide">{{ $item->category->name }}</td>
                            <td class="name">{{ $item->name }}</td>
                            <td class="edit"><button class="btn" data-function="editItem({{ $item->id }})">Edit item</button></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="edit-category form-fields modal-box mfp-hide" data-scope="CargoCtrl">
            <form>
                <div class="modal-header">
                    <h2>Edit category</h2>
                </div>
                <div>
                    <span class="category-id hide"></span>
                    <label for="name">Name</label>
                    <input type="text" id="name">
                </div>
                <div class="modal-footer">
                    <button class="btn delete" data-function="deleteCategory()">Delete</button>
                    <button class="btn submit" data-function="updateCategory()">Save</button>
                </div>
            </form>
        </div>

        <div class="new-category form-fields modal-box mfp-hide" data-scope="CargoCtrl">
            <form>
                <div class="modal-header">
                    <h2>New category</h2>
                </div>
                <div>
                <label for="name">Name</label>
                    <input type="text" id="name">
                </div>
                <div class="modal-footer">
                    <button class="btn cancel" data-function="closePopups()">Cancel</button>
                    <button class="btn save" data-function="saveCategory()">Save</button>
                </div>
            </form>
        </div>

        <div class="new-item form-fields modal-box mfp-hide" data-scope="CargoCtrl">
            <form>
                <div class="modal-header">
                    <h2>New item</h2>
                </div>
                <div>
                    <label for="name">Name</label>
                    <input type="text" id="name">
                    <label for="width">Width</label>
                    <input type="text" id="width" class="numeric">
                    <label for="length">Length</label>
                    <input type="text" id="length" class="numeric">
                    <label for="category">Category</label>
                    <select id="category" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <button class="btn cancel" data-function="closePopups()">Cancel</button>
                    <button class="btn submit" data-function="saveItem()">Save</button>
                </div>
            </form>
        </div>
    </div>

    <div class="edit-item form-fields modal-box mfp-hide" data-scope="CargoCtrl">
        <form>
            <div class="modal-header">
                <h2>Edit item</h2>
            </div>
            <div>
                <span class="item-id hide"></span>
                <label for="name">Name</label>
                <input type="text" id="name">
                <label for="width">Width</label>
                <input type="text" id="width" class="numeric">
                <label for="length">Length</label>
                <input type="text" id="length" class="numeric">
                <label for="category">Category</label>
                <select id="category" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="modal-footer">
                <button class="btn delete" data-function="deleteItem()">Delete</button>
                <button class="btn submit" data-function="updateItem()">Save</button>
            </div>
        </form>
    </div>
@stop
