<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Transaction;

class AdminOrder extends Controller
{
    public function index()
    {
        $orders = Order::with('payment', 'orderDetails')->get();
        // dd($orders[0]);
        return view('admin.orders.index', compact('orders'));
    }
    public function details($id)
    {
        $order = Order::with('payment', 'orderDetails.product', 'shippmentAdress')->where('id', $id)->first();
        // dd($order);
        return view('admin.orders.details', compact('order'));
    }
}
