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


Route::prefix('admin')->middleware('admin')->name('admin.')->group(function (){
    Route::get('/admin',"HomeController@admin")->name('admin');
    Route::get('/users',"HomeController@users")->name('users');
});

Route::prefix('guest')->middleware('guest')->name('guest.')->group(function (){
    Route::get('/poco',"HomeController@poco")->name('poco');
});

Route::get('/signup',"HomeController@signup")->name('signup');
Route::post('/signup',"HomeController@register");
Route::get('/login',"HomeController@login")->name('login');
Route::post('/login',"HomeController@postlogin" );
Route::get('/logout',"HomeController@logout")->name('logout');
Route::get('/home',"HomeController@home")->name('home')->middleware('auth');

Route::prefix('post')->middleware('auth')->name('post.')->group(function (){
    Route::get('/add','PostController@add')->name('add');
    Route::post('/add','PostController@save');
    Route::get('/edit/{post}','PostController@edit')->name('edit');
    Route::post('/edit/{post}','PostController@update');
    Route::get('/delete/{post}','PostController@delete')->name('delete');
});

Route::get('/post/posts','PostController@posts')->name('post.posts'); // Put inside the post group





Route::get('/vediohome',"VideoController@vediohome")->name('vediohome');
Route::get('/vediopost',"VideoController@vediopost")->name('vediopost');
Route::get('/page',"HomeController@page")->name('page');


//06.06.21

//ajax with out modal
        Route::get('ajax-request-index', 'AjaxController@index')->name('ajax.index');

        Route::get('ajax-request', 'AjaxController@create')->name('ajax.create');  
        Route::post('ajax-request', 'AjaxController@store')->name('ajax.store');


        Route::get('ajax-request-show/{blog}', 'AjaxController@show')->name('ajax.show');
        Route::post('ajax-request-edit/{blog}', 'AjaxController@update')->name('ajax.update');

        Route::get('ajax-request-edit/{blog}', 'AjaxController@edit')->name('ajax.edit');
        Route::post('ajax-request-index/{blog}', 'AjaxController@delete')->name('ajax.delete');

//ajax with out modal

Route::get('ajax-modal-index', 'ModalajaxController@index')->name('modal.index');
Route::post('ajax-modal-index', 'ModalajaxController@store')->name('modal.store');

Route::get('ajax-modal-index/create', 'ModalajaxController@create')->name('modal.create');
Route::get('ajax-modal-index/show/{blog}', 'ModalajaxController@show')->name('show.modal.show');
Route::put('ajax-modal-index/{blog}', 'ModalajaxController@update')->name('modal.update');
Route::get('ajax-modal-index/{blog}', 'ModalajaxController@show')->name('modal.show');
Route::delete('ajax-modal-index/{blog}', 'ModalajaxController@delete')->name('modal.delete');
Route::get('ajax-modal-index/{blog}/edit', 'ModalajaxController@edit')->name('modal.edit');


