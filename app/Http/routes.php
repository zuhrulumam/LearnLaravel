<?php

/*
  |--------------------------------------------------------------------------
  | Routes File
  |--------------------------------------------------------------------------
  |
  | Here is where you will register all of the routes in an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | This route group applies the "web" middleware group to every route
  | it contains. The "web" middleware group is defined in your HTTP
  | kernel and includes session state, CSRF protection, and more.
  |
 */

Route::group(['middleware' => ['web']], function () {
    Route::get('cheatsheet', function () {
        return view('cheatsheet');
    });
    Route::get('admin', function() {
        return view('admin/dashboard');
    });


    Route::get('/','user\HomeController@index');
});

// crud blog post
Route::group(['middleware' => ['web']], function () {
    Route::get('admin/create-post', 'admin\BlogController@getCreate');
    Route::post('admin/create-post', 'admin\BlogController@postCreate');

    Route::get('admin/posts', 'admin\BlogController@index');

    Route::get('admin/{slug?}/edit', 'admin\BlogController@getEditPost');
    Route::post('admin/{slug?}/edit', 'admin\BlogController@postEditPost');

    Route::post('admin/{slug?}/delete', 'admin\BlogController@postDelete');

    Route::get('admin/{slug?}/read', 'admin\BlogController@getReadPost');
});
