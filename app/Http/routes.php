<?php

Route::group(['middleware' => 'auth'], function() {
    Route::controller('trips', 'TripController');
    Route::controller('cargo', 'CargoController');
    Route::controller('boats', 'BoatController');
    Route::get('boats/edit/{id}', 'BoatController@getEdit');
});

Route::controller('auth', 'Auth\AuthController');
Route::get('/', 'TripController@getIndex');
