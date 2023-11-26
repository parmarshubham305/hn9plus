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
Route::group(['as' => 'project_manager.'], function () {

	Auth::routes();

	Route::get('logout', 'Auth\LoginController@logout')->name('logout');
	Route::get('locked', 'Auth\LoginController@locked')->name('locked');

	Route::group(['middleware' => ['project_manager', 'revalidate']], function () {
		Route::resource('/dashboard', 'DashboardController');

		Route::post('developers/delete', 'DeveloperController@delete')->name('developers.delete');
		Route::resource('/developers', 'DeveloperController');

		Route::post('users/delete', 'UserController@delete')->name('users.delete');
		Route::resource('/users', 'UserController');

		Route::resource('/chats', 'ChatController');
	});
});
