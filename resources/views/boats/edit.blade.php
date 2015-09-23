@extends('layouts.master')
@section('content')
    <div class="boats">
        <div class="row">
            <h2>Edit boat</h2>

            <div class="form-fields col-sm-6">
                <fieldset>
                    <legend>General information</legend>
                    <label for="name">Name</label>
                    <input type="text" id="name" value="{{ $boat['name'] }}">
                    <label for="password">Change password</label>
                    <input type="text" id="password">
                    <label for="confirmPassword">Confirm password</label>
                    <input type="text" id="confirmPassword">
                </fieldset>
            </div>
            <div class="form-fields col-sm-6">
                <fieldset>
                    <legend>Deck information</legend>
                    <label for="image">Upload deck image</label>
                    <input type="file" id="image"">
                    <label for="width">Deck width</label>
                    <input type="text" id="width" value="{{ $boat['width'] }}">
                    <label for="length">Deck length</label>
                    <input type="text" id="length" value="{{ $boat['length'] }}">
                    <img src="#">
                    <button class="drag-deck">Drag the deck</button>
                </fieldset>
            </div>
        </div>

        <div class="row boat-actions">
            <button class="send-login">Send login details</button>
            <button class="save-boat">Save</button>
        </div>
    </div>
@stop