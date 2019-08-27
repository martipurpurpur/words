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
Route::get('/words', 'WordsController@index')->name('words');

Route::get('/words/create', 'WordsController@create')->name('words.create');

Route::post('/words/store', 'WordsController@store')->name('words.store');

Route::get('/words/table', 'WordsController@table')->name('words.table');

Route::delete('/words/delete/{id}', 'WordsController@delete')->name('words.delete');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/friends', 'FriendsController@index')->name('friends');

Route::post('/friends/store', 'FriendsController@store')->name('friends.store');

Route::delete('/friends/delete/{id}', 'FriendsController@delete')->name('friends.delete');

Route::get('/clients', 'ClientsController@index')->name('clients');

Route::post('/clients/store', 'ClientsController@store')->name('clients.store');

Route::delete('/clients/delete/{id}', 'ClientsController@delete')->name('clients.delete');

Route::get('/clients/edit/{id}', 'ClientsController@edit')->name('clients.edit');  //доделать

Route::put('/clients/{id}', 'ClientsController@update')->name('clients.update');   //верно ли нужно ли


