<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

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

//rotte sotto autenticazione (auth)

Route::middleware('auth')->namespace('Admin')->prefix('admin')->name('admin.')->group(function(){

    Route::get('/', 'HomeController@index')->name('index');

    //rotta per il controller di Restaurants (CRUD)
    Route::resource('/restaurants', 'RestaurantsController');

    //rotta per il controller di Dishes
     Route::resource('/dishes', 'DishesController');


});

Route::get('test', [TestController::class, 'index']);


Route::get('{any?}', function () {

    return view('guest.home');

})->where('any','.*');


//rotta per la post di order
// Route::post('/orders', [OrderController::class, 'store']);
