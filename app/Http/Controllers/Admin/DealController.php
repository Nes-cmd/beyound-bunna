<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SpecialProduct;
use App\Models\Product;
use App\Models\ProductPhoto;
class DealController extends Controller
{
    public function index()
    {
        $products = Product::where('instock', '!=', 0)->get();
        $specials = SpecialProduct::all();
        return view('admin.products.specials', compact(['products', 'specials']));
    }
    public function specialStore(Request $request)
    {
        $name = 'unset';
        if( $request->has('image')){
            $name = $request->image->store('public/special');
            $name = 'storage'.substr($name, 6);
        }
        if($name == 'unset'){
            $name = ProductPhoto::where('product_id', $request->product)->first()->path;
        }
        SpecialProduct::create([
            'product_id' => $request->product,
            'path' => $name,
            'offer' => $request->offer,
            'title' => $request->title,
            'count_down' => $request->countdown,
        ]);
        return back();
    }
}
