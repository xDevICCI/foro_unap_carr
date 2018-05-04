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
Route::get('/all/users/','UsersController@index')->name('show_all_users');
Route::get('/make/admin/{user}','UsersController@makeadmin')->name('make_admin');
Route::get('/make/subscriber/{user}','Userscontroller@makesubscriber')->name('make_subsc');
Route::delete('/delete/user/{user}','Userscontroller@destroy')->name('delete_user');
Route::get('/new/user','Userscontroller@create')->name('new_user_create');
Route::patch('/new/user/store','Userscontroller@store')->name('store_new_user');
Route::get('/user/verify/{token}','UsersController@verifyUser');
Route::get('/create/channel','ChannelController@create')->name('create_channel');
Route::delete('/delete/channel/{channel}','ChannelController@destroy')->name('delete_channel');
Route::get('/edit/channel/{channel}/edit','ChannelController@edit')->name('edit_channel');
Route::put('/update/channel/{channel}','ChannelController@update')->name('update_channel');
Route::post('/new/channel','ChannelController@store')->name('new_channel');