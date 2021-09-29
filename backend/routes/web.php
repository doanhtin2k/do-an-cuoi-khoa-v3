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

Route::middleware('auth')->get('/',"HomeController@index");
Route::middleware('auth')->get('/search',"SearchController@index")->name('search');
Route::middleware('auth')->get('/profile',"UserController@profileFrm")->name('profileFrm');
Route::middleware('auth')->put('/profile',"UserController@profile")->name('profile');
Route::middleware('auth')->get('/home', 'HomeController@index')->name('home');
Route::middleware('auth')->resource('/category',"CategoryController");
Route::middleware('auth')->resource('/product',"ProductController");
Route::middleware('auth')->resource('/order',"OrderController")->only(['index','show']);
Auth::routes();
