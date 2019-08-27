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

//category routes
Route::get('/createcategory', 'CategoryController@create')->name('createcategory');
Route::post('/createcategory', 'CategoryController@store')->name('createcategory.store');
Route::get('/categorylist', 'CategoryController@index')->name('categorylist');
Route::get('/categoryarc', 'CategoryController@indexarc')->name('categoryarc');
Route::get('/categoryedit/{id}', 'CategoryController@edit')->name('categoryedit');
Route::post('/categoryedit/{id}', 'CategoryController@update')->name('categoryedit.update');
Route::post('/categorydelete/{id}', 'CategoryController@delete')->name('categorydelete');
Route::post('/categorydestroy/{id}', 'CategoryController@destroy')->name('categorydestroy');
Route::post('/categoryactive/{id}', 'CategoryController@active')->name('categoryactive');

//menu route
Route::get('/createmenu', 'MenuController@create')->name('createmenu');
Route::post('/createmenu', 'MenuController@store')->name('createmenu.store');
Route::get('/menulist', 'MenuController@index')->name('menulist');
Route::get('/menuarc', 'MenuController@indexarc')->name('menuarc');
Route::get('/menuedit/{id}', 'MenuController@edit')->name('menuedit');
Route::post('/menuedit/{id}', 'MenuController@update')->name('menuedit.update');
Route::post('/menudelete/{id}', 'MenuController@delete')->name('menudelete');
Route::post('/menudestroy/{id}', 'MenuController@destroy')->name('menudestroy');
Route::post('/menuactive/{id}', 'MenuController@active')->name('menuactive');

//staff route
Route::get('/createstaff', 'StaffController@create')->name('createstaff');
Route::post('/createstaff', 'StaffController@store')->name('createstaff.store');
Route::get('/stafflist', 'StaffController@index')->name('stafflist');
Route::get('/staffarc', 'StaffController@indexarc')->name('staffarc');
Route::get('/staffedit/{id}', 'StaffController@edit')->name('staffedit');
Route::post('/staffedit/{id}', 'StaffController@update')->name('staffedit.update');
Route::post('/staffdelete/{id}', 'StaffController@delete')->name('staffdelete');
Route::post('/staffdestroy/{id}', 'StaffController@destroy')->name('staffdestroy');
Route::post('/staffactive/{id}', 'StaffController@active')->name('staffactive');
