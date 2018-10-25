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

Route::group(['middleware' => 'jwt.verify'], function () {
    Route::get('games', 'GamesController@index');
    Route::post('games', 'GamesController@store');
    
    Route::patch('frames/{frame}', 'FramesController@update');
});
