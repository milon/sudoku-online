<?php

Route::post('/register', 'PlayerAuthController@register');
Route::post('/auth/token', 'PlayerAuthController@getAccessToken');
Route::post('/auth/token/reset', 'PlayerAuthController@passwordResetRequest');
Route::post('/auth/token/change', 'PlayerAuthController@changePassword');

Route::group(['middleware' => 'auth.player'], function() {
    Route::get('/leadboard', 'LeadboardController@index');
    Route::get('/games', 'GameController@index');
    Route::get('/levels', 'LevelController@index');
    Route::get('/levels/{level}', 'LevelController@show');

    Route::get('players/next-game', 'PlayerController@nextGame');
    Route::post('players/submit-game', 'PlayerController@submitGame');
});
