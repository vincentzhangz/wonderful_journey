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

Route::get('/', 'ArticleController@showAllArticle')->name('home');
Route::get('/category/{id}', 'ArticleController@showArticleByCategory')->name('category');
Route::get('/full/{id}', 'ArticleController@showArticleById')->name('full');
Route::get('/login', 'GeneralController@loadLogin')->name('login');
Route::get('/signup', 'GeneralController@loadSignup')->name('signup');
Route::get('/logout', 'UserController@logout')->name('logout');
Route::post('/signup', 'UserController@store');
Route::post('/login', 'UserController@login');
Route::get('/admin', 'UserController@showAllAdmin')->name('admin')->middleware('role:admin');
Route::get('/user', 'UserController@showAllUser')->name('user')->middleware('role:admin');
Route::get('/blog/user/{id}', 'ArticleController@showArticleByUserId')->name('blogByUser')->middleware('role:user');
Route::get('/profile', 'UserController@showProfile')->name('profile')->middleware('role:user');
Route::get('/newBlog', 'ArticleController@showCreateArticlePage')->name('newBlog')->middleware('role:user');
Route::post('/newBlog', 'ArticleController@createNewArticle')->name('newBlog')->middleware('role:user');
Route::get('/deleteBlog/{id}', 'ArticleController@deleteArticle')->name('deleteBlog')->middleware('role:user');
Route::get('/deleteUser/{id}', 'UserController@deleteUser')->name('deleteUser')->middleware('role:admin');;
Route::post('/updateProfile', 'UserController@updateProfile')->middleware('role:user');
Route::get('/about', 'GeneralController@about')->name('about');
