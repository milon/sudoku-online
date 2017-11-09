<?php

Route::get('/test', 'TestController@test');

Route::get('/games', 'GameController@index');
Route::get('/levels', 'LevelController@index');
Route::get('/levels/{level}', 'LevelController@show');
