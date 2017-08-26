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

Route::get('/', 'AppController@index')->name('home');

// Auth
Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function () {
    Route::get('login', 'AuthController@login')->name('auth.login');
    Route::get('logout', 'AuthController@logout')->name('auth.logout');

    Route::get('redirect/{driver}', 'SocialController@redirect')->name('auth.social.redirect');
    Route::get('callback/{driver}', 'SocialController@callback')->name('auth.social.callback');
});

Route::resource('mixes', 'MixController');
Route::resource('users', 'UserController');
Route::resource('flavours', 'FlavourController');
