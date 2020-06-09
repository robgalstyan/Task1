<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes(['verify'=>true]);
Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::get('/create', 'NoteController@create')->name('create');
Route::post('/store', 'NoteController@store')->name('store');
Route::get('/edit/{id}', 'NoteController@edit')->name('edit/{id}');
Route::post('/update/{id}', 'NoteController@update')->name('update/{id}');
Route::delete('/delete/{id}', 'NoteController@delete')->name('delete/{id}');
