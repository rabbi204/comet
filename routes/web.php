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

// blog post search by search field

Route::post('search','App\Http\Controllers\FrontEndController@postBySearch')-> name('post.search');

// blog post search by category
Route::get('category/{slug}','App\Http\Controllers\FrontEndController@postByCategory') ->name('blog.search.category');

// blog post search by tag
Route::get('tag/{slug}','App\Http\Controllers\FrontEndController@postByTag') ->name('blog.search.tag');

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
Route::get('tag-unpublished/{id}', 'App\Http\Controllers\TagController@unpublishedTag')-> name('tag.unpublished');
Route::get('tag-published/{id}', 'App\Http\Controllers\TagController@publishedTag')-> name('tag.published');

// all Post routes
Route::resource('post','App\Http\Controllers\PostController');
Route::get('post-edit/{id}', 'App\Http\Controllers\PostController@edit');
Route::patch('post-update', 'App\Http\Controllers\PostController@postUpdate')-> name('post.update.ajax');
Route::get('post-unpublished/{id}', 'App\Http\Controllers\PostController@unpublishedTag')-> name('post.unpublished');
Route::get('post-published/{id}', 'App\Http\Controllers\PostController@publishedTag')-> name('post.published');


// web settings route
Route::get('settings/logo','App\Http\Controllers\SettingsController@logoIndex')-> name('logo.index');
Route::put('settings/logo-update','App\Http\Controllers\SettingsController@logoUpdate')-> name('logo.update');

// web social route
Route::get('settings/social','App\Http\Controllers\SettingsController@socialIndex')-> name('social.index');
Route::post('settings/social-update','App\Http\Controllers\SettingsController@socialUpdate')-> name('social.update');
