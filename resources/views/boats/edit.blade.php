@extends('layouts.master')
@section('content')
    <div class="boats"  data-scope="BoatCtrl">
            <h2>Edit boat</h2>
        <div class="row">

            <div class="form-fields col-sm-6">
                <fieldset>
                    <legend>General information</legend>
                    <span class="boat-id hide">{{ $boat['id'] }}</span>
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
                    <input type="file" id="image">
                    <label for="width">Deck width</label>
                    <input type="text" id="width" class="numeric" value="{{ $boat['width'] }}">
                    <label for="length">Deck length</label>
                    <input type="text" id="length" class="numeric" value="{{ $boat['length'] }}">
                    <img class="deck-image" src="{{ url('/') }}/uploads/{{ $boat['id'] }}.jpg">
                    <button class="btn drag-deck">Drag the deck</button>
                </fieldset>
            </div>
        </div>

        <div class="row boat-actions">
            <button class="btn send-login">Send login details</button>
            <button class="btn save-boat" data-function="updateBoat()">Save</button>
        </div>
    </div>
@stop