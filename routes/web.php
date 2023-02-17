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


Auth::routes();






Route::middleware('auth')->namespace('Admin')->prefix('admin')->name('admin.')->group(function(){

    Route::get('/', 'HomeController@index')->name('index');

    //rotta per il controller di Restaurants
    Route::resource('/restaurants', 'RestaurantsController');

    //rotta per il controller di Dishes
     Route::resource('/dishes', 'DishesController');


});


Route::get('{any?}', function () {

    return view('guest.home');

})->where('any','.*');
