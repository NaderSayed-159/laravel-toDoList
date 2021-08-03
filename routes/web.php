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


Route::resource('users', 'usersController');

Route::get('login', 'usersController@loginIndex');

Route::post('userLogin', 'usersController@login');

Route::get('logout', 'usersController@logout');


Route::resource('tasks', 'Task');
