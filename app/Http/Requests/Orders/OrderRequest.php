<?php

namespace App\Http\Requests\Orders;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidProduct;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            /* Tocchera passare l'id dell'ordine */

            'token' => 'fake-valid-nonce',
            'dish' =>
            [
                'required',

                new ValidProduct(),
            ]
        ];
    }
}
