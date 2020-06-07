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

//->middleware('verified')
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'HomeController@logout')->name('logout');
Route::get('/create', 'NoteController@create')->name('create');
Route::post('/store', 'NoteController@store')->name('store');
Route::get('/edit/{id}', 'NoteController@edit')->name('edit/{id}');
Route::post('/edit_save/{id}', 'NoteController@edit_save')->name('edit_save/{id}');
Route::delete('/delete/{id}', 'NoteController@delete')->name('delete/{id}');
