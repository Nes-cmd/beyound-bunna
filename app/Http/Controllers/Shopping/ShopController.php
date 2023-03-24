<?php

namespace App\Http\Controllers\Shopping;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MainCategory;
use App\Models\Slider;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\SpecialProduct;

class ShopController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('visiblity', true)->get();
        $dealofday = SpecialProduct::where('status', 1)->where('count_down', '>', now())->where('popup_type', 1)->first();
        $categories = MainCategory::where('visiblity', true)->get();
        $collections = Product::limit(8)->get();
        $popup = SpecialProduct::where('status', 1)->where('popup_type', 2)->first();
        return view('customer-shop.index',compact(['sliders', 'dealofday', 'popup','categories','collections']));
    }
    public function checkout()
    {
        return view('customer-shop.checkout');
    }
    public function list($id)
    {
        $products = Product::with('productPhotos')->where('main_category_id', $id)->get();
        $subCategorys = SubCategory::where('main_category_id', $id)->get();
        return view('customer-shop.shop-list', compact(['products','subCategorys']));
    }
    public function grid($id)
    {
        $products = Product::with('productPhotos')->where('main_category_id', $id)->get();
        $subCategorys = SubCategory::where('main_category_id', $id)->get();
        return view('customer-shop.shop', compact(['products','subCategorys']));
    }
    public function subList($name, $sub_id)
    {
        $products = Product::with('productPhotos')->where('sub_category_id', $sub_id)->get();
        $subCategorys = SubCategory::where('id', $sub_id)->get();
        return view('customer-shop.shop-list', compact(['products','subCategorys', ]));
    }
    public function subGrid($name, $sub_id)
    {
        $products = Product::with('productPhotos')->where('sub_category_id', $sub_id)->get();
        $subCategorys = SubCategory::where('id', $sub_id)->get();
        return view('customer-shop.shop', compact(['products','subCategorys', ]));
    }
    public function detail($id)
    {
        $product = Product::with('productPhotos')->where('id', $id)->first();
        return view('customer-shop.product-single', compact('product'));
    }
}
