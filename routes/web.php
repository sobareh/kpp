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

// Route::get('/home', 'TaskListController@index');

Route::get('/create', function () {
    return view('pages.create');
} );

// Route::post('/test','TaskController@create');

Route::resource('task', 'TaskController');