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

Route::get('/home', 'DashController@index')->name('home');
Route::get('/my/profile','ProfileController@show')->name('my_profile');
Route::patch('/update/my/profile/','ProfileController@update')->name('update_my_profile');







