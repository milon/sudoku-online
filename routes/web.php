<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'welcome');
Route::get('/login', function() {
    return redirect()->guest('/admin/login');
});

Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth'], 'namespace' => 'Admin'], function() {
    CRUD::resource('players', 'PlayerCrudController');
    CRUD::resource('levels', 'LevelCrudController');
    CRUD::resource('games', 'GameCrudController');
    CRUD::resource('users', 'UserCrudController');
});
