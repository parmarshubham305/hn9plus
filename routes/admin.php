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
Route::get('create', function(){
	// \Artisan::call('migrate:refresh');
	App\Models\Admin::create([
		'name' => 'Admin',
		'email' => 'admin@admin.com',
		'password' => \Hash::make('123456')
	]);

	return "Done";
});

Route::group(['as' => 'admin.'], function () {

	Auth::routes();

	Route::get('logout', 'Auth\LoginController@logout')->name('logout');
	Route::get('locked', 'Auth\LoginController@locked')->name('locked');

	Route::group(['middleware' => ['admin', 'revalidate']], function () {
		Route::resource('/dashboard', 'DashboardController');

		Route::post('skills/delete', 'SkillController@delete')->name('skills.delete');
		Route::resource('/skills', 'SkillController');

		Route::post('quotes/delete', 'QuoteController@delete')->name('quotes.delete');
		Route::resource('/quotes', 'QuoteController');
		
		Route::post('developers/delete', 'DeveloperController@delete')->name('developers.delete');
		Route::resource('/developers', 'DeveloperController');

		Route::post('users/delete', 'UserController@delete')->name('users.delete');
		Route::resource('/users', 'UserController');

		Route::resource('/chats', 'ChatController');
	});
});
