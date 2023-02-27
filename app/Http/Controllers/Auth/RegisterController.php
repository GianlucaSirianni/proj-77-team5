<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Restaurant;
use App\Models\Category;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        if(isset($data['categories'])) {

            return Validator::make($data, [

                'username' => ['required', 'string', 'max:25'],
                'surname' => ['required', 'string', 'max:25'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'vat' => ['required', 'numeric', 'digits:11', 'unique:restaurants'],
                'categories' => ['required', 'exists:categories,id']
            ]
          /*   ,
            [
                'vat.digits' => 'Il campo VAT deve contenere 11 cifre',
                'vat.numeric' => 'Il campo VAT deve contenere solo cifre',
            ] */);
        }else {

            $data['categories'] = null;

            return Validator::make($data, [

                'username' => ['required', 'string', 'max:25'],
                'surname' => ['required', 'string', 'max:25'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'vat' => ['required', 'numeric', 'digits:11', 'unique:restaurants'],
                'categories' => ['required', 'exists:categories,id']
                ]/* ,
                [
                    'vat.digits' => 'La P.Iva deve contenere 11 cifre',
                    'vat.numeric' => 'La P.Iva deve contenere solo cifre',
                ] */
            );

        }

    }

    /**
     * Show the registration form and pass the category options to the view.
     *
     * @return \Illuminate\View\View
     **/
    public function showRegistrationForm()
    {
        $categories = Category::all();
        // dd($categories);
        return view('auth.register', compact('categories'));
    }



    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        {
            $user =  User::create([
                'username' => $data['username'],
                'surname' => $data['surname'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);

            $restaurant =  Restaurant::create([
                'name' => $data['name'],
                'address' => $data['address'],
                'vat' => $data['vat'],
                'user_id' => $user->id
            ]);

            if (isset($data['categories'])) {
                $restaurant->category()->sync($data['categories']);
            };

            return $user;


        }


    }
}
