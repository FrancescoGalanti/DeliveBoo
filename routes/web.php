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

Route::get('/', 'HomeController@index')->name('homepage');

Auth::routes();

Route::prefix('admin')
    ->namespace('Admin')
    ->name('admin.')
    ->middleware('auth')
    ->group(function(){
        Route::get('/','HomeController@index')->name('home');
        Route::get('/orders','OrderController@index')->name('orders');

        Route::resource('restaurants', 'RestaurantController');
    });

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/restaurant/{name}', 'RestaurantController@filter')->name('RestaurantByGenre');
Route::get('/restaurant', 'RestaurantController@index')->name('Restaurant');
/* Route::prefix('guest')
    ->namespace('Guest')
    ->name('guest.')
    ->group(function(){
        Route::get('/', 'RestaurantController@index')->name('restaurant');
    }); */