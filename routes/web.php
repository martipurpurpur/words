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
Route::get('/rita', function () {
    $users = ['rita', 'sima', 'pavel', 'test'];
    return view('rita', ['users' => $users, 'date' => '18.08.2019']);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
