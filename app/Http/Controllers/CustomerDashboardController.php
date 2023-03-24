<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\ShippmentAdress;
use Illuminate\Http\Request;

class CustomerDashboardController extends Controller
{
    public function index()
    {
        $orders = Order::with('orderDetails', 'payment')->where('user_id', auth()->id())->get();
        return view('customer-shop.dashboard.index', compact('orders'));
    }
    public function address()
    {
        $adresses = ShippmentAdress::with('country','city')->where('user_id', auth()->id())->get();
        
        return view('customer-shop.dashboard.address', compact('adresses'));
    }
    public function order()
    {
        $orders = Order::with('orderDetails', 'payment')->where('user_id', auth()->id())->get();
        return view('customer-shop.dashboard.order', compact('orders'));
    }
    public function profile()
    {
        $user = auth()->user();
        return view('customer-shop.dashboard.profile', compact('user'));
    }
    public function edit()
    {
        $user = auth()->user();
        return view('customer-shop.dashboard.edit', compact('user'));
    }
}
