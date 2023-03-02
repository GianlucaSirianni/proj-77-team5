<?php

use App\Http\Controllers\Api\RestaurantsController;
use App\Http\Controllers\Api\CategoriesController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\PaymentController;
use App\Model\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Model\Order;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//rotte per le API

//rotta per ristoranti
Route::namespace('Api')->prefix('/restaurants')->group(function () {
    // localhost:8000/api/restaurants
    Route::get('/', 'RestaurantsController@index');
    // localhost:8000/api/restaurants/1/
    Route::get('/{id}', 'RestaurantsController@show');
});

//rotta per piatti

Route::namespace('Api')->prefix('/dishes')->group(function () {
    // localhost:8000/api/dishes/id/
    Route::get('/{id}', 'DishesController@getDishesByRestaurantId');

});

//rotte per BarinTree

Route::get('/generate',[PaymentController::class, 'generate']);
Route::post('/make/payment', [PaymentController::class, 'makePayment']);


//rotta per categorie
Route::get('/restaurants',[RestaurantsController::class, 'index']);
Route::get('/categories', [CategoriesController::class, 'index']);

//rotta per la post di order


Route::namespace('Api')->prefix('/orders')->group(function () {
    // localhost:8000/api/dishes/id/
    Route::post('/', [OrderController::class, 'store']);

});

Route::get('/restaur',[RestaurantsController::class,'paginate']);
