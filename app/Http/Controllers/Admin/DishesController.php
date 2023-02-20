<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dish;
use App\Models\Restaurant;
//immagini
use Illuminate\Support\Facades\Storage;

class DishesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $data = [
        //     'dishes' => Dish::All()
        // ];

        // Recupera il parametro di query "restaurant_id" dalla richiesta HTTP
        $restaurant_id = request()->input('restaurant_id');

        // Filtra solo i piatti del ristorante selezionato
        $dishes = Dish::where('restaurant_id', $restaurant_id)->get();


        //$restaurant = Restaurant::findOrFail('restaurant_id');

        // Passa i piatti alla vista "dishes.blade.index"
        return view(
        'admin.dishes.index',
        ['dishes' => $dishes],
        // $data
    );


        //return view('admin.dishes.index', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dishes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        // $my_restaurant = new Restaurant();

        $restaurant_id = $request->input('restaurant_id');
       // dd($restaurant_id);

        $request->validate([
            'name' => 'required|string|max:255',
            'ingredients' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required',
        ]);

        $dish = new Dish;

        if(array_key_exists('image', $data)){
            $cover_url = Storage::put('dishes', $data['image']);
            $data['cover_dish'] = $cover_url;
        }

        $dish->name = $request->name;
        $dish->ingredients = $request->ingredients;
        $dish->description = $request->description;
        $dish->price = $request->price;
        $dish->restaurant_id = auth()->id(); // Imposta il valore di user_id sull'id dell'utente autenticato
        $dish->fill($data);
        $dish->save();

        return redirect()->route('admin.dishes.index',
        // $my_restaurant->user_id
        );
        // return redirect()->route('admin.dishes.index', ['restaurant_id' => $elem->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dishes_show = Dish::findOrFail($id);

        return view('admin.dishes.show', compact('dishes_show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dish_edit = Dish::findOrFail($id);
        return view('admin.dishes.edit',compact('dish_edit'));
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
        $data = $request->all();
        $singleDish = Dish::findOrFail($id);

        if(array_key_exists('image', $data)){
            $cover_url = Storage::put('dishes', $data['image']);
            $data['cover_dish'] = $cover_url;
        }

        $singleDish->update($data);

        return redirect()->route('admin.dishes.show',$singleDish->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $singleDish = Dish::findOrFail($id);

        if($singleDish->cover_dish){
            Storage::delete($singleDish->cover_dish);
        };

        $singleDish->delete();
        return redirect()->route('admin.dishes.index');
    }
}
