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
// Welcome route
Route::get('/', function () {
    return view('welcome');
});

// Vines entries routes
Route::get('/bamboos', 'BamboosController@index')->name('bamboos-index');
Route::get('/bamboos/create', 'BamboosController@create')->name('bamboos-create');
Route::post('/bamboos/store', 'BamboosController@store')->name('bamboos-store');
Route::get('/bamboos/{id}', 'BamboosController@show')->name('bamboos-show');
Route::get('/bamboos/{id}/edit', 'BamboosController@edit')->name('bamboos-edit');
Route::put('/bamboos/{id}', 'BamboosController@update')->name('bamboos-update');
Route::delete('/bamboos/{id}', 'BamboosController@destroy')->name('bamboos-destroy');

Route::get('/search', 'BamboosController@search')->name('search-show');
Route::post('/search', 'BamboosController@search')->name('search-show');

// Pictures of vines entries routes
Route::get('/pictures/create/{bambooId}', 'PicturesController@create')->name('pictures-create');
Route::post('/pictures/store', 'PicturesController@store')->name('pictures-store');

// Authorization routes
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
