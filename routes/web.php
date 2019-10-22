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

//words

Route::get('/words', 'WordsController@index')->name('words');
Route::get('/words/create', 'WordsController@create')->name('words.create');
Route::post('/words/store', 'WordsController@store')->name('words.store');
Route::get('/words/table', 'WordsController@table')->name('words.table');
Route::delete('/words/delete/{id}', 'WordsController@delete')->name('words.delete');
Route::get('/words/edit/{id}', 'WordsController@edit')->name('words.edit');
Route::put('/words/{id}', 'WordsController@update')->name('words.update');
Route::get('/words/{id}', 'WordsController@counter')->name('words.counter');
//Route::get('/words/increment', 'WordsController@incrementCounter')->name('words.increment');
//Route::get('/words/decrement', 'WordsController@decrementCounter')->name('words.decrement');
//Route::get('/words/updateIndex', 'WordsController@updateIndex')->name('words.updateIndex');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//clients

Route::get('/clients', 'ClientsController@index')->name('clients');
Route::get('/references/table', 'ReferencesController@table')->name('references.table');
Route::post('/clients/store', 'ClientsController@store')->name('clients.store');
Route::delete('/clients/delete/{id}', 'ClientsController@delete')->name('clients.delete');
Route::get('/clients/edit/{id}', 'ClientsController@edit')->name('clients.edit');
Route::put('/clients/{id}', 'ClientsController@update')->name('clients.update');

 //function reference

Route::get('/references', 'ReferencesController@index')->name('references');
Route::post('/references/store', 'ReferencesController@store')->name('references.store');
Route::delete('/references/delete/{id}', 'ReferencesController@delete')->name('references.delete');
Route::get('/references/edit/{id}', 'ReferencesController@edit')->name('references.edit');
Route::put('/references/{id}', 'ReferencesController@update')->name('references.update');



