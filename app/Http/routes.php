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
    Route::get('admin/login', function() {
        return view('admin/auth/login');
    });
    
    Route::post('admin/login', 'auth\AuthController@postLogin');
    
    Route::get('admin/email-reset', 'auth\PasswordController@getEmail'); 
    
    Route::get('admin/password-reset', 'auth\PasswordController@getReset');  
    
    Route::get('admin/logout', 'auth\AuthController@logout');  
});

Route::group(['middleware' => ['web', 'auth']], function () {

    Route::get('admin', function() {
        return view('admin/dashboard');
    });
});

// crud blog post
Route::group(['middleware' => ['web', 'auth']], function () {
    Route::get('admin/create-post', 'admin\BlogController@getCreate');
    Route::post('admin/create-post', 'admin\BlogController@postCreate');

    Route::get('admin/posts', 'admin\BlogController@index');

    Route::get('admin/{slug?}/edit', 'admin\BlogController@getEditPost');
    Route::post('admin/{slug?}/edit', 'admin\BlogController@postEditPost');

    Route::post('admin/{slug?}/delete', 'admin\BlogController@postDelete');

    Route::get('admin/{slug?}/read', 'admin\BlogController@getReadPost');

    Route::post('admin/{slug?}/soft-delete-post', 'admin\BlogController@postSoftDelete');
});

// comments
Route::group(['middleware' => ['web', 'auth']], function() {
    Route::get("/admin/comments", "admin\CommentController@index");

    Route::get("/admin/changeStatus/{slug?}/{status?}", "admin\CommentController@changeStatus");

    Route::get("admin/{slug}/read-comment", "admin\CommentController@read");

    Route::get("admin/{slug}/edit-comment", "admin\CommentController@getEdit");
    Route::post("admin/{slug}/edit-comment", "admin\CommentController@postEdit");

    Route::post("admin/{slug}/delete-comment", "admin\CommentController@postDelete");
});

//user route
Route::group(['middleware' => ['web']], function () {

    Route::get('cheatsheet', function () {
        return view('cheatsheet');
    });
    Route::get('/', 'user\HomeController@index');
    Route::get("read/{slug?}", 'user\HomeController@readPost');

    Route::post("read/{slug?}", "user\HomeController@postComment");

    Route::get('/twitter', function() {
        return Share::load('http://www.example.com', 'My example')->facebook();
    });
});

// categories
Route::group(['middleware' => ['web', 'auth']], function() {
    Route::get("/admin/categories", "admin\CategoriesController@index");

    Route::get("admin/{slug}/read-category", "admin\CategoriesController@read");

    Route::get("admin/create-category", "admin\CategoriesController@getCreate");
    Route::post("admin/create-category", "admin\CategoriesController@postCreate");

    Route::get("admin/{slug}/edit-category", "admin\CategoriesController@getEdit");
    Route::post("admin/{slug}/edit-category", "admin\CategoriesController@postEdit");

    Route::post("admin/{slug}/delete-category", "admin\CategoriesController@postDelete");

    Route::post('admin/{slug?}/trash-category', 'admin\CategoriesController@postTrash');

//    Route::controller('admin/categories', 'admin\CategoriesController', [
//        'getAllData' => 'categories.data'
//    ]);

    Route::get('admin/all-categories', 'admin\CategoriesController@getAllData');
});

// media
Route::group(['middleware' => ['web', 'auth']], function() {
    Route::get("/admin/media", "admin\MediaController@index");

    Route::get("admin/{slug}/read-media", "admin\MediaController@read");

    Route::get("admin/create-media", "admin\MediaController@getCreate");
    Route::post("admin/create-media", "admin\MediaController@postCreate");

    Route::get("admin/{slug}/edit-media", "admin\MediaController@getEdit");
    Route::post("admin/{slug}/edit-media", "admin\MediaController@postEdit");

    Route::post("admin/{slug}/delete-media", "admin\MediaController@postDelete");

    Route::get('admin/trash-media', 'admin\MediaController@getTrash');
    Route::post('admin/{slug?}/trash-media', 'admin\MediaController@postTrash');

    Route::post('admin/{slug?}/restore-media', 'admin\MediaController@postRestore');
});


