<?php

namespace App\Http\Controllers\Api;
use App\Models\Order;
use App\Models\Dish;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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


        // Validazione dei dati ricevuti
        $validatedData = $request->validate([
            'customer_name' => 'required|max:255',
            'customer_surname' => 'required|max:255',
            'customer_address' => 'required|max:255',
            'phone_number' => 'required|max:20',
            'email' => 'required|email|max:255',
            'order_note' => 'nullable|max:255',
            'total_price'=> 'required',
            'cart' => 'required|array',
            'cart.*.chiave.name' => 'required|max:255',
            'cart.*.chiave.price' => 'required|numeric|min:0',
            'cart.*.quantity' => 'required|integer|min:1',
            'restaurant_id' => 'required|exists:restaurants,id',
        ]);

        // return response()->json(['message' => $validatedData], 201);
        $cart = $validatedData['cart'];

        // Salvataggio dei dati nella tabella "orders"
        $order = new Order();
        $order->customer_name = $validatedData['customer_name'];
        $order->customer_surname = $validatedData['customer_surname'];
        $order->customer_address = $validatedData['customer_address'];
        $order->phone_number = $validatedData['phone_number'];
        $order->email = $validatedData['email'];
        $order->order_note = $validatedData['order_note'];
        $order->total_price = $validatedData['total_price'];
        // $order->cart = $validatedData['cart'];
        $order->restaurant_id = $validatedData['restaurant_id'];
        $order->save();

        // Associa i piatti all'ordine nella tabella pivot "dish_order"
        foreach ($cart as $item) {


        $order->dishes()->attach($item['chiave']['id']
        // ['quantity' => $item['quantity']]
    );
        $order->save();
        }

        // Invio della risposta
        return response()->json(['message' => 'Ordine salvato con successo'], 201);
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
