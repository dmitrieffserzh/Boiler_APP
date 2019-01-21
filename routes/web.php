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


Auth::routes(['verify' => true]);

Route::get('/login_ajax', 'MainController@loginajax')->name('ajax');
Route::get('/', 'MainController@index')->name('main');
Route::post('/check_username', 'Auth\RegisterController@checkUsername')->name('check_username');
