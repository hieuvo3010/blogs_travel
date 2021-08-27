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




Route::resource('category', 'CategoryController');
Route::resource('post', 'PostsController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth', 'role:user');

Route::get('/', 'CategoryController@homepage')->name('homepage');
Route::get('category/delete/{id}', 'CategoryController@delete')->name('category.delete');
Route::get('blogs/show/{id}', 'CategoryController@showCategory')->name('showCategory');
Route::get('category/show/{id}', 'PostsController@showArticle')->name('showArticle');


Route::get('blogs/tim-kiem', 'PostsController@searchBlog')->name('searchBlog');

Route::get('post/delete/{id}', 'PostsController@delete')->name('post.delete');