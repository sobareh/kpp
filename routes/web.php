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

Route::middleware('auth')->group(function () {
    Route::post('upload', 'TaskController@upload');
    Route::get('download/{id}', 'TaskController@download');
    Route::resource('task', 'TaskController');
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
});


Route::view('detail', 'pages.detail');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
