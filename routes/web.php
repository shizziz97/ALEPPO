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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('protected', ['middleware' => ['auth', 'admin'], function() {
    return "this page requires that you be logged in and an Admin";
}]);

Route::resource('/admin/users', 'UserController', ['middleware' => ['auth', 'admin']]);
Route::resource('/admin/categories','CategoryController',['middleware'=>['auth','admin']])->except('create','show');
Route::get('/home', 'HomeController@index')->name('home');
