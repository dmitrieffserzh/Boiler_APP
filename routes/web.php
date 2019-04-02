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
Route::get('/catalog',                   ['as' => 'catalog',                  'uses' => 'MainController@catalog']);
// MAIN ROUTE ======================================================================================================= //
Route::get('/',                                 [ 'as' => 'main',                         'uses' => 'MainController@index', 'middleware' => 'verified' ]);
Route::get('/login',                            [ 'as' => 'login',                        'uses' => 'Auth\LoginController@showLoginForm' ]);

Auth::routes(['verify' => true]);

// SOCIAL NETWORK AUTH
Route::get( '/redirect/{service}',              [ 'as' => 'oauth.login',                  'uses' => 'Auth\OAuthController@redirect' ]);
Route::get( '/callback/{service}',              [                                         'uses' => 'Auth\OAuthController@callback' ]);






// ADMIN ============================================================================================================ //
Route::group([
    'namespace'  => 'Admin',
    'prefix'     => 'admin'], function() {
    Route::get('/',                             [ 'as' => 'index',                         'uses' => 'AdminController@index' ]);
});










// NEWS ============================================================================================================= //
Route::group([
    'prefix' => 'news',
    'middleware' => 'filter.view.counts'], function() {
    Route::get('/',                             [ 'as' => 'news',                         'uses' => 'NewsController@index' ]);
    Route::get('/{route}',                      [ 'as' => 'news.url',                     'uses' => 'NewsController@getURL' ])->where('route', '(.+)');
});


// PROFILES ========================================================================================================= //
Route::get('/users',                          [ 'as' => 'users.list',                   'uses' => 'ProfileController@index' ]);
Route::get('/{route}',                        [ 'as' => 'user.profile',                 'uses' => 'ProfileController@profile' ]);
Route::get('/{route}/edit',                   [ 'as' => 'user.profile.edit',            'uses' => 'ProfileController@edit' ]);
Route::get('/{route}/edit/route',             [ 'as' => 'user.profile.edit.url',        'uses' => 'ProfileController@editUrl' ]);






// AJAX
Route::post('/check_username',                [ 'as' => 'check_username',               'uses' => 'Auth\RegisterController@checkUsername' ]);

// LIKE
Route::post('like_handler',                   ['as' => 'like_handler',                  'uses' => 'LikeController@like']);








