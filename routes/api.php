<?php

/**
 * Authenticaiton
 */
Route::prefix('auth')->group(function () {
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});

Route::middleware('jwt.verify')->group(function () {
    Route::post('game', 'GameController@store');
});
