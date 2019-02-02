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
Route::get("/profile/{id}", "UserController@profile")->name("profile");
Route::get("/user/avatar/{filename}", "UserController@getImage")->name("user.avatar");
Route::get("/upload-image", "ImageController@create")->name("image.create");
Route::post("/image/save", "ImageController@save")->name("image.save");
Route::post("/comment/save", "CommentController@save")->name("comment.save");
Route::get("/image/file/{filename}", "ImageController@getImage")->name("image.file");
Route::get("/image/{id}", "ImageController@detail")->name("image.detail");
Route::get("/comment/delete/{id}", "CommentController@delete")->name("comment.delete");
Route::get("/like/{image_id}", "LikeController@like")->name("like.save");
Route::get("/dislike/{image_id}", "LikeController@dislike")->name("like.delete");
Route::get("/likes", "LikeController@index")->name("likes");
