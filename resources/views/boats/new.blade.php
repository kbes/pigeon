@extends('layouts.master')
@section('content')
    <h2>New boat</h2>

    <fieldset>
        <legend>General information</legend>
        <label for="name">Name</label>
        <input type="text" id="name">
    </fieldset>

    <fieldset>
        <legend>Deck information</legend>
        <label for="image">Upload deck image</label>
        <input type="file" id="image">
        <label for="width">Deck width</label>
        <input type="text" id="width">
        <label for="length">Deck length</label>
        <input type="text" id="length">
        <img src="#">
        <a href="#">Drag the deck</a>
    </fieldset>
@stop