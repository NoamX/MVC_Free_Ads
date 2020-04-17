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

// Route::get('/', function () {
//     return view('welcome');
// });
Auth::routes(['verify' => true]);
Route::get('/', 'IndexController@showIndex');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'UserController@index')->name('profile');
Route::get('/profile/edit', 'UserController@update')->name('edit');
Route::post('/profile/edit', 'UserController@update')->name('edit');

Route::get('/annonce', 'AnnonceController@showIndex')->name('annonce');
// Route::get('/annonce/create', 'Annoncecontroller@create')->name('create');
// Route::post('/annonce/create', 'AnnonceController@create')->name('create');
