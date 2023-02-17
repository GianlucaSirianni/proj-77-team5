<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Storage;

class RestaurantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = [
            'restaurants' => Restaurant::All()
        ];


        return view('admin.restaurants.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.restaurants.create');
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


        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'vat' => 'required|unique:restaurants,vat|string|max:255',
        ]);

        $restaurant = new Restaurant;

        if(array_key_exists('image', $data)){
            $cover_url = Storage::put('restaurants', $data['image']);
            $data['cover_restaurants'] = $cover_url;
        }

        $restaurant->name = $request->name;
        $restaurant->address = $request->address;
        $restaurant->vat = $request->vat;
        $restaurant->user_id = auth()->id(); // Imposta il valore di user_id sull'id dell'utente autenticato
        $restaurant->fill($data);
        $restaurant->save();

        return redirect()->route('admin.restaurants.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $restaurants_show = Restaurant::findOrFail($id);

        return view('admin.restaurants.show', compact('restaurants_show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $restaurant_edit = Restaurant::findOrFail($id);
        return view('admin.restaurants.edit',compact('restaurant_edit'));
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
        $singleRestaurant = Restaurant::findOrFail($id);

        if(array_key_exists('image', $data)){
            $cover_url = Storage::put('restaurants', $data['image']);
            $data['cover_restaurants'] = $cover_url;
        }

        $singleRestaurant->update($data);

        return redirect()->route('admin.restaurants.show',$singleRestaurant->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $singleRestaurant = Restaurant::findOrFail($id);

        if($singleRestaurant->cover_restaurants){
            Storage::delete($singleRestaurant->cover_restaurants);
        };
        $singleRestaurant->delete();
        return redirect()->route('admin.restaurants.index');
    }
}
