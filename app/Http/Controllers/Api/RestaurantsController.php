<?php

namespace App\Http\Controllers\Api;

use App\Models\Restaurant;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RestaurantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Ottiene un array di tutti i ristoranti e le loro categorie associate.
        $restaurants = Restaurant::with('category')->get()->toArray();

        // Ottiene la stringa di ID di categoria dalla query string nella richiesta HTTP.
        $categoryIds = $request->query('category_id');

        // Ottiene il nome del ristorante dalla query string nella richiesta HTTP e lo converte in minuscolo.
        $restaurantName = strtolower($request->query('name'));

        // Inizializza un array vuoto che conterrà i ristoranti che soddisfano i criteri di ricerca.
        $results = [];

        // Verifica se sono presenti sia la stinga di ID di categoria che il nome del ristorante.
        if ($categoryIds && $restaurantName) {
            // Chiama la funzione categoryCheck per filtrare i ristoranti in base all'ID di categoria e al nome del ristorante.
            $results = $this->categoryCheck($restaurants, $categoryIds, $restaurantName);
        }
        // Verifica se è presente solo la stringa di ID di categoria.
        elseif ($categoryIds) {
            // Chiama la funzione categoryCheck per filtrare i ristoranti in base all'ID di categoria.
            $results = $this->categoryCheck($restaurants, $categoryIds);
        }
        // Verifica se è presente solo il nome del ristorante.
        elseif ($restaurantName) {
            // Filtra i ristoranti in base al nome del ristorante utilizzando il metodo where() di Eloquent.
            $results = Restaurant::where('name', 'Like', '%' . $restaurantName . '%')->get();
        }
        // Se non sono presenti parametri di ricerca, restituisce tutti i ristoranti.
        else {
            $results = $restaurants;
        }

        // Restituisce l'array di ristoranti che soddisfano i criteri di ricerca.
        return $results;
    }


    public function categoryCheck($restaurants, $categoryIds, $restaurantName = '')
    {
        // Converte la stringa $categoryIds in un array di ID di categoria.
        $arrayCategoryIds = explode(",", $categoryIds);

        // Inizializza un array vuoto che conterrà i ristoranti che soddisfano i criteri di ricerca.
        $results = [];

        // Scorre ogni ristorante nell'array $restaurants.
        foreach ($restaurants as $restaurant) {
            // Verifica se il nome del ristorante corrente contiene la stringa $restaurantName.
            if (str_contains(strtolower($restaurant['name']), $restaurantName)) {
                // Inizializza un contatore che conta il numero di categorie che corrispondono alla ricerca per ogni ristorante.
                $counter = 0;

                // Scorre ogni categoria del ristorante corrente e incrementa il contatore se l'ID di categoria è presente nell'array $arrayCategoryIds.
                foreach ($restaurant['category'] as $restaurantCategory) {
                    if (in_array($restaurantCategory['id'], $arrayCategoryIds)) {
                        $counter++;
                    }
                }

                // Se il contatore corrisponde al numero di ID di categoria nell'array $arrayCategoryIds, il ristorante viene aggiunto all'array $results.
                if ($counter === count($arrayCategoryIds)) {
                    $results[] = $restaurant;
                }
            }
        }

        // Restituisce l'array di ristoranti che soddisfano i criteri di ricerca.
        return $results;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $restaurants_show = Restaurant::all()->find($id);

        // return response()->json($restaurants_show);

        // if(!$restaurants_show) return response('Ristorante non trovato', 404, )


        // recupera il ristorante con l'ID e il nome specificati
        $restaurant = Restaurant::where('id', $id)
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
    public function paginate(Request $request)
    {

        // Ottiene la stringa di ID di categoria dalla query string nella richiesta HTTP.

        $categoryIds = $request->query('category_id');

        $colletionCategoryIds = collect( explode(",", $categoryIds))->filter();

        // Ottiene il nome del ristorante dalla query string nella richiesta HTTP e lo converte in minuscolo.
        $restaurantName = strtolower($request->query('name'));

        $restaurants = Restaurant::with('category');

        // if ($colletionCategoryIds->count()) {
        //     $restaurants->whereHas('category', function($query) use ($colletionCategoryIds) {
        //         $query->whereIn('id', $colletionCategoryIds);
        //     });
        // }

        $colletionCategoryIds->map(function($category_id) use ($restaurants, $colletionCategoryIds ) {
            $restaurants->whereHas('category', function($query) use ($category_id) {
                $query->where('id', $category_id);
            });
        });

        if (!empty($restaurantName))  {
            $restaurants->where('name', 'LIKE', "%{$restaurantName}%");
        }

        // dd($restaurants->toSql());

        return $restaurants->paginate(6);
    }
}
