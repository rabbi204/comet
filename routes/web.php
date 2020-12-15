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

//frontEnd route

Route::get('/','App\Http\Controllers\FrontEndController@homePage');
Route::get('/blog','App\Http\Controllers\FrontEndController@blogPage')->name('blog');
Route::get('/blog-single/{slug}','App\Http\Controllers\FrontEndController@singlePost') -> name('blog.single');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// all Category routes
Route::resource('post-category','App\Http\Controllers\CategoryController');
Route::get('post-category-edit/{id}','App\Http\Controllers\CategoryController@edit');
Route::post('post-category-update','App\Http\Controllers\CategoryController@update')->name('category.update');
Route::get('post-category-unpublished/{id}','App\Http\Controllers\CategoryController@unpublishedCategory')->name('category.unpublished');
Route::get('post-category-published/{id}','App\Http\Controllers\CategoryController@publishedCategory')->name('category.published');


// all Tag routes
Route::resource('tag','App\Http\Controllers\TagController');

// all Post routes
Route::resource('post','App\Http\Controllers\PostController');
