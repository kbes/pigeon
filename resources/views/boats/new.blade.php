@extends('layouts.master')
@section('content')
    <div class="boats"  data-scope="BoatCtrl">
        <h2>New boat</h2>

        <div class="row">
            <div class="form-fields col-sm-6">
                <fieldset>
                    <legend>General information</legend>
                    <label for="name">Name</label>
                    <input type="text" id="name">
                </fieldset>
            </div>
            <div class="form-fields col-sm-6">
                <fieldset>
                    <legend>Deck information</legend>
                    <label for="width">Deck width</label>
                    <input type="text" id="width" class="numeric">
                    <label for="length">Deck length</label>
                    <input type="text" id="length" class="numeric">
                    <label for="image">Upload deck image</label>
                    <input type="file" id="image">
                    <div class="deck-image">
                    </div>
                    <button class="btn" href="#">Drag the deck</button>
                </fieldset>
            </div>
        </div>

        <div class="row boat-actions">
            <button class="btn save-boat" data-function="saveBoat()">Save</button>
        </div>
    </div>
@stop