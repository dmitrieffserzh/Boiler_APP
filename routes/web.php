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
Route::post('/login',                           [ 'as' => 'login',                      'uses' => 'Auth\LoginController@showLoginForm' ]);




// PROFILES
Route::get('/users',                          [ 'as' => 'users.list',                   'uses' => 'ProfileController@index' ]);
Route::get('/{route}',                        [ 'as' => 'user.profile',                 'uses' => 'ProfileController@profile' ]);
Route::get('/{route}/edit',                   [ 'as' => 'user.profile.edit',            'uses' => 'ProfileController@edit' ]);
Route::get('/{route}/edit/route',             [ 'as' => 'user.profile.edit.url',        'uses' => 'ProfileController@editUrl' ]);

// MAIN ROUTE
Route::get('/',                               [ 'as' => 'main',                         'uses' => 'MainController@index', 'middleware' => 'verified' ]);

// AJAX
Route::post('/check_username',                [ 'as' => 'check_username',               'uses' => 'Auth\RegisterController@checkUsername' ]);