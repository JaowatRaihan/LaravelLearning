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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/Home', 'Home\IndexController@index');
// Route::get('/Home/{id}', 'Home\IndexController@show');

Route::get('/', 'Front\IndexController@index');
Route::get('/posts', 'Front\PostController@index');
Route::get('/post/create', 'Front\PostController@create');
Route::post('/posts/add', 'Front\PostController@store');
