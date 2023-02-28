<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Braintree\Gateway;
use App\Http\Request\Orders\OrderRequest;
use App\Models\Dish;

class PaymentController extends Controller
{
    public function generate(Request $request,Gateway $gateway){

        $token = $gateway-> clientToken()-> generate();

        $data = [

            'token' => $token,
        ];

        return response()->json($data,200);
    }

    public function makePayment(OrderRequest $request,Gateway $gateway){

        $dish = Dish::find($request->dish);

        $result = $gateway->transaction()->sale([

            'amount' => $dish->price,

            'paymentMethodNonce'=> $request->token,

            'options' => [

                'submitForSetlement' => true
            ]

        ]);

        if($result->success){

            $data = [

                'success' => true,

                'message' => 'Transazione eseguita con successo!'
            ];

            return response()->json($data,200);

        }else{

            $data = [

                'success' => false,

                'message' => 'Transazione fallita!'
            ];
        }

        return response()->json($data,401);
    }
}
