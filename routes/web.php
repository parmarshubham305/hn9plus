<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\GoogleLoginController;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('authorized/google', [GoogleLoginController::class, 'redirectToGoogle']);
Route::get('authorized/google/callback', [GoogleLoginController::class, 'handleGoogleCallback']);

Route::group(['as' => 'front.', 'namespace' => 'Front', 'middleware' => ['auth']], function () {
    Route::resource('/users', 'UserController');

    Route::resource('fixed-rate', 'FixedRateController');
    
    Route::resource('hourly-rate', 'HourlyRateController');

    Route::resource('dashboard', 'DashboardController');
    Route::get('chat', 'DashboardController@chat')->name('chat');

    Route::get('resources/{id}', 'HireResourceController@viewResume')->name('view.resume');

    Route::get('{type}/{id}/hire-resources', 'HireResourceController@create')->name('hire.resource');

});
