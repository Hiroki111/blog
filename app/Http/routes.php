<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
 */

Route::auth();
Route::get('/admin', 'AdminController@index');
Route::get('/admin/create', 'AdminController@create')->name('createPost');
Route::post('/admin', 'AdminController@store');
Route::get('/admin/{id}/edit', 'AdminController@edit')->name('editPost');
Route::put('/admin/{id}', 'AdminController@update');
Route::delete('/admin/{id}', 'AdminController@destroy');

Route::get('/', 'HomeController@index');
