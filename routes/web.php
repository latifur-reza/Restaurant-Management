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

Route::get('/', 'PagesController@index')->name('index');

Route::get('/createcategory', 'CategoryController@create')->name('createcategory');
Route::post('/createcategory', 'CategoryController@store')->name('createcategory.store');
Route::get('/categorylist', 'CategoryController@index')->name('categorylist');
Route::get('/categoryarc', 'CategoryController@indexarc')->name('categoryarc');
Route::get('/categoryedit/{id}', 'CategoryController@edit')->name('categoryedit');
Route::post('/categoryedit/{id}', 'CategoryController@update')->name('categoryedit.update');
Route::post('/categorydelete/{id}', 'CategoryController@delete')->name('categorydelete');
Route::post('/categorydestroy/{id}', 'CategoryController@destroy')->name('categorydestroy');
Route::post('/categoryactive/{id}', 'CategoryController@active')->name('categoryactive');
