<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
//immagini
use Illuminate\Support\Facades\Storage;
//utente loggato
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

class RestaurantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Restituisce solo i ristoranti dell'utente loggato
        $user = Auth::user();
        //query string dove prende l'id dello user
        $restaurants = Restaurant::with('user', 'category')->where('user_id', $user->id)->get();
        // dd($restaurants);



        return view('admin.restaurants.index', ['restaurants' => $restaurants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      //
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
        //
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
        $categories = Category::All();

        return view('admin.restaurants.edit',compact('restaurant_edit', 'categories'));
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

        if(array_key_exists('categories', $data)){

            $singleRestaurant->category()->sync($data['categories']);
        }else{

            $singleRestaurant->category()->sync([]);
        }

        return redirect()->route('admin.restaurants.index',$singleRestaurant->id);
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
