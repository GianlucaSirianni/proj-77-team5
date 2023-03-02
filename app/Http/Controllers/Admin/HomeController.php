<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\Models\Order;
use App\Models\Restaurant;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {

        return redirect()->route('admin.restaurants.index');
    }
}
