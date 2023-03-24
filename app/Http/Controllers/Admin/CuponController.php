<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cupon;

class CuponController extends Controller
{
    public function index()
    {
        $cupons = Cupon::all();
        // dd($cupons);
        return view('admin.cupon', compact('cupons'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        Cupon::create([
            'code' => $request->code,
            'givento_name' => $request->givento_name,
            'givento_phone' => $request->givento_phone,
            'discount' => $request->discount,
            'expire_at' => $request->expire_at,
            'max_limit' => $request->max_limit,
            'type' => $request->discount_type
        ]);
        return back();
    }
}
