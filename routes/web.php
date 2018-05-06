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
    return view('landing');
})->name('landing');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/picture', [
   'as' => 'edit.picture',
    'uses' => 'PictureController@index'
]);

Route::post('/picture', [
    'as' => 'store.picture',
    'uses' => 'PictureController@store'
]);