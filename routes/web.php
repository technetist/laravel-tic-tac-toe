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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/new-game', 'HomeController@newGame');

Route::get('/board/{id}', 'GameController@board');

Route::post('/play/{id}', 'GameController@play');

Route::post('/game-over/{id}', 'GameController@gameOver');
