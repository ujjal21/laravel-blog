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


Route::get('/signup',"HomeController@signup")->name('signup');
Route::post('/signup',"HomeController@register")
;
Route::get('/login',"HomeController@login")->name('login');
Route::post('/login',"HomeController@postlogin" );

Route::get('/logout',"HomeController@logout")->name('logout');
Route::get('/home',"HomeController@home")->name('home')->middleware('auth');

Route::get('/create',"HomeController@home")->name('create');
Route::post('/create',"HomeController@home")->name('home')->middleware('auth');

Route::get('/home',"HomeController@home")->name('home')->middleware('auth');


Route::prefix('post')->middleware('auth')->name('post.')->group(function (){
    Route::get('/add','PostController@add')->name('add');
    Route::post('/add','PostController@save');
    //Route::get('/posts','PostController@posts')->name('posts');

    Route::get('/edit/{post}','PostController@edit')->name('edit');
    Route::post('/edit/{post}','PostController@update');
    Route::get('/delete/{post}','PostController@delete')->name('delete');
});

Route::get('/post/posts','PostController@posts')->name('post.posts'); // Put inside the post group

