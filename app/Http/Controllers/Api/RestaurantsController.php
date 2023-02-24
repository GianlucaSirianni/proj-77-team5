<?php

namespace App\Http\Controllers\Api;

use App\Models\Restaurant;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class RestaurantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $categoryId = $request->query('category_id');

        if ($categoryId) {
            $categoryId = explode(",", $categoryId);

            $restaurants = Restaurant::whereHas('category', function(Builder $query) use($categoryId){
                $query->whereIn('id', $categoryId);
            })->with('dishes')->get();

        } else {
            $restaurants = Restaurant::with('dishes')->get();
        }

        return $restaurants;
        // $restaurants_api = Restaurant::with('category', 'dishes')->get();
        // $restaurants_api = Restaurant::with('category', 'dishes')->get();

        // return response()->json($restaurants_api);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {



        // recupera il ristorante con l'ID e il nome specificati
        $restaurant = Restaurant::where('id', $id)->with('dishes')
            // ->where('name', $name)
            ->first();

        if ($restaurant) {
            // restituisci il ristorante come risposta JSON
            return response()->json($restaurant);
        } else {
            // restituisci una risposta di errore
            return response()->json(['message' => 'Ristorante non trovato'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
