<?php
use App\Model\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::namespace('Api')->prefix('/restaurants')->group(function(){
   // localhost:8000/api/restaurants
    Route::get('/','RestaurantsController@index');
// localhost:8000/api/restaurants/1/
    Route::get('/{id}', 'RestaurantsController@show');

});

//rotta per piatti

Route::namespace('Api')->prefix('/dishes')->group(function(){

     Route::get('/','DishesController@index');

      Route::get('/{id}', 'DishesController@show');

    // Route::get('/{restaurant_id}', 'DishesController@show');

 });

 //rotta per categorie

//  Route::namespace('Api')->prefix('/dishes')->group(function(){

//     // localhost:8000/api/categories
//     Route::get('/','CategoriesController@index');

//      Route::get('/{id}', 'CategoriesController@show');

//    // Route::get('/{restaurant_id}', 'DishesController@show');

// });

