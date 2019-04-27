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

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function() {
    //Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/orders','OrderController');
    Route::resource('/users','Auth\RegisterController');
    Route::resource('/departments','DepartmentController');
    Route::get("/users/{id}/departments",'UserController@departments')->name("users.departments");
});
