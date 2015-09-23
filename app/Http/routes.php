<?php

Route::get('/', 'FrontController@getIndex');

Route::controller('auth', 'Auth\AuthController');
Route::controller('boats', 'BoatController');
Route::controller('trips', 'TripController');
Route::controller('cargo', 'CargoController');