<?php

// namespace App\Http\Controllers\Admin;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;

// class HomeController extends Controller
// {
//     public function index()
//     {
//         return view('admin.home');
//     }
// }

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
        $user = Auth::user();
        $orders = Order::whereHas('restaurant', function ($query) use ($user) {
        $query->where('user_id', $user->id);
        })->get();

        return view('admin.home', compact('orders'));
    }
}
