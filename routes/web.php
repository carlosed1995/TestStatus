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
    return view('listuser');
}); 

//return view('listuser',compact('users'));

Route::resource('users', 'ListUsersController');
Route::post('isactive', 'ListUsersController@isActive')->name('isactive');
