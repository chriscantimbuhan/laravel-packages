<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/users', 'App\Http\Controllers\UserController@index')->name('index');
Route::get('/users/options', 'App\Http\Controllers\UserController@options')->name('options');