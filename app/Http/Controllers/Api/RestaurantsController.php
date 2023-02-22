<?php

namespace App\Http\Controllers\Api;
use App\Models\Restaurant;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RestaurantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants_api = Restaurant::all();
        return response()->json($restaurants_api);


        // $query = Restaurant::query();

        // if ($request->has('search')) {
        // $searchTerm = $request->input('search');
        // $query->where('name', 'LIKE', "%$searchTerm%");
        // }

        // $ristoranti = $query->get();

    return response()->json($ristoranti);
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
    public function show($name)
    {
        // $restaurants_show = Restaurant::all()->find($id);

        // return response()->json($restaurants_show);

        // if(!$restaurants_show) return response('Ristorante non trovato', 404, )


         // recupera il ristorante con l'ID e il nome specificati
            $restaurant = Restaurant::where('name', $name)
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
