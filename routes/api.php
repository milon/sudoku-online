<?php

Route::get('/test', 'TestController@test');

Route::post('/auth/token', 'PlayerAuthController@getAccessToken');
Route::post('/auth/token/reset', 'PlayerAuthController@passwordResetRequest');
Route::post('/auth/token/change', 'PlayerAuthController@changePassword');

Route::get('/games', 'GameController@index');
Route::get('/levels', 'LevelController@index');
Route::get('/levels/{level}', 'LevelController@show');
