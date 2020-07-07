<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/userlist','UserController@show')->name('showuser');
Route::get('/userlist/add','UserController@addUser')->name('adduser');
Route::post('/userlist/add','UserController@saveuser')->name('saveuser');