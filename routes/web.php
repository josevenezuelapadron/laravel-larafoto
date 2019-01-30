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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get("/configuracion", "UserController@config")->name("config");
Route::post("/user/update", "UserController@update")->name("user.update");
Route::get("/user/avatar/{filename}", "UserController@getImage")->name("user.avatar");
Route::get("/upload-image", "ImageController@create")->name("image.create");
