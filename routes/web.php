<?php

use Illuminate\Support\Facades\Route;


Route::get('/clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:cache'); 
    Artisan::call('config:clear');
    Artisan::call('route:clear'); 
    Artisan::call('view:clear');
    return "<h2>Cleared cache, config, view, logs of the project!</h2>";
});

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/Home', 'Home\IndexController@index');
// Route::get('/Home/{id}', 'Home\IndexController@show');


Route::get('/', 'Front\IndexController@index');

//---------------Post Controller Starts-------------------------------
Route::group(['middleware' => ['sessUser']], function () {
    Route::get('/posts', 'Front\PostController@index');
    Route::get('/post/create', 'Front\PostController@create');
    Route::get('/post/view/{id}', 'Front\PostController@show');
    Route::get('/post/edit/{id}', 'Front\PostController@edit');
    Route::get('/post/delete/{id}', 'Front\PostController@destroy');
    Route::post('/posts/add', 'Front\PostController@store');
    Route::post('/post/update', 'Front\PostController@update');
});
//---------------Post Controller Ends-------------------------------

Route::post('/auth/signup', 'AuthController@store');
Route::post('/auth/signin', 'AuthController@login');
Route::get('/auth/signout', 'AuthController@logout');