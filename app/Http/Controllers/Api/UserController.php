<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
//utente loggato
use Illuminate\Support\Facades\Auth;
// use Illuminate\Foundation\Auth\User as Authenticatable;

class UserController extends Controller
{

    public function getUser(request $request)
    {
        $user = Auth::user();

        return response()->json($user);
        dd($user);
    }




}
