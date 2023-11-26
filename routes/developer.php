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


Route::group(['as' => 'developer.'], function () {

    Auth::routes();

    Route::get('logout', 'Auth\LoginController@logout')->name('logout');

    Route::group(['middleware' => ['developer']], function () {
        Route::resource('dashboard', 'DashboardController');
        Route::get('chat', 'DashboardController@chat')->name('chat');
    });
});
