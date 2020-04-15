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
Route::get('/', 'IndexController@showIndex');
Auth::routes(['verify' => true]);
Route::get('/profile', 'UserController@showProfile')->name('profile');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile/edit', 'UserController@editProfile')->name('edit');
Route::post('/profile/edit', 'UserController@editProfile')->name('edit');