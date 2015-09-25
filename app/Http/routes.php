<?php

Route::controller('auth', 'Auth\AuthController');
Route::controller('boats', 'BoatController');
Route::controller('trips', 'TripController');
Route::controller('cargo', 'CargoController');

Route::get('/', 'TripController@getIndex');
Route::get('boats/edit/{id}', 'BoatController@getEdit');
