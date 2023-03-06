<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;

class TestController extends Controller
{

    public function index()
    {
        dd(config('session.domain'));
    }


}
