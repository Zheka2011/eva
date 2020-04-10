<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'HomeController@index')->middleware('auth')->name('home');

Route::get('/materials', 'StorageController@index')->middleware('auth')->name('storage');
Route::post('/materials/submit', 'StorageController@mat_add')->middleware('auth')->name('stored');
Route::post('/materials/mat_del', 'StorageController@mat_del')->middleware('auth')->name('mat_del');

Route::get('/orders', 'OrdersController@index')->middleware('auth')->name('orders');
Route::post('/orders/ord_add', 'OrdersController@ord_add')->middleware('auth')->name('ord_add');

Route::get('/sellings', 'SellingsController@index')->middleware('auth')->name('sellings');
Route::get('/sellings/{id}', 'SellingsController@selMQ')->middleware('auth')->name('selMQ');
Route::post('/sellAdd', 'SellingsController@selAdd')->middleware('auth')->name('selAdd');
Route::post('/sellAddMQ/{id}', 'SellingsController@selAddMQ')->middleware('auth')->name('selAddMQ');

Route::get('/exps', 'ExpsController@index')->middleware('auth')->name('exps');
Route::post('/addExps', 'ExpsController@addExps')->middleware('auth')->name('addExps');

Route::group(['middleware' => 'role:superadmin'], function () {
	Route::get('/users', 'UserController@index')->middleware('auth')->name('users');
});

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

// Route::group(['middleware' => 'role:admin'], function () {
// 	Route::get('/storage', 'StorageController@index');
// 	Route::get('/orders', 'OrdersController@index');
// });

// Route::group(['middleware' => 'role:master'], function () {
// 	Route::get('/storage', 'StorageController@index');
// 	Route::get('/orders', 'OrdersController@index');
// });