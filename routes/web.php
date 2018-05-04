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

Auth::routes();


Route::view('/','welcome');
Route::get('/home', 'DashController@index')->name('home');
Route::get('/forum', 'DashController@index_forum')->name('forum');

Route::get('/my/profile','ProfileController@show')->name('my_profile');
Route::patch('/update/my/profile/','ProfileController@update')->name('update_my_profile');

// users CRUD

Route::get('/all/users/','UsersController@index')->name('show_all_users');
Route::get('/make/admin/{user}','UsersController@makeadmin')->name('make_admin');
Route::get('/make/subscriber/{user}','Userscontroller@makesubscriber')->name('make_subsc');
Route::delete('/delete/user/{user}','Userscontroller@destroy')->name('delete_user');
Route::get('/new/user','Userscontroller@create')->name('new_user_create');
Route::patch('/new/user/store','Userscontroller@store')->name('store_new_user');
Route::get('/user/verify/{token}','UsersController@verifyUser');

// channel CRUD

Route::get('/create/channel','ChannelController@create')->name('create_channel');
Route::delete('/delete/channel/{channel}','ChannelController@destroy')->name('delete_channel');
Route::get('/edit/channel/{channel}/edit','ChannelController@edit')->name('edit_channel');
Route::put('/update/channel/{channel}','ChannelController@update')->name('update_channel');
Route::post('/new/channel','ChannelController@store')->name('new_channel');

// Thread CRUD

Route::get('/new/thread/create',['as'=>'create_thread','uses'=>'ThreadController@create']);
Route::post('/new/thread/store',['as'=>'store_thread','uses'=>'ThreadController@store']);
Route::get('/show/thread/{slug}',['as'=>'show_thread_id','uses'=>'ThreadController@show']);
Route::get('/all/threads',['as'=>'show_all_threads','uses'=>'ThreadController@index']);
Route::delete('/delete/thread/{thread}',['as'=>'delete_thread','uses'=>'ThreadController@destroy']);
Route::get('/thread/{thread}/edit',['as'=>'edit_thread','uses'=>'ThreadController@edit']);
Route::put('/thread/update/{thread}/',['as'=>'update_thread','uses'=>'ThreadController@update']);


// Reply CRUD

Route::post('/post/reply/{thread}',['as'=>'post_reply','uses'=>'ReplyController@store']);






