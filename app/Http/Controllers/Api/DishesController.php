<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dish;

class DishesController extends Controller
{

    /**
     *
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getDishesByRestaurantId($id)
    {
        $dishes = Dish::where('restaurant_id', $id)->where('visible', true)->get();

        return response()->json($dishes);
    }


}
