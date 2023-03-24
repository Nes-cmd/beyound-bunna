<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MainCategory;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\ProductPhoto;
use App\Models\MainCategoryPhotos;
use App\Models\Slider;

use Image;
use App\MyClasses\ImageFilter;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('productPhotos', 'mainCategory', 'subCategory')->get();
        return view('admin.products.index', compact(['products']));
    }
    public function addProduct()
    {
        $mainCategory = MainCategory::all();
        $productType = ProductType::all();
        return view('admin.products.add', compact(['mainCategory', 'productType']));
    }
    public function storeProduct(Request $request)
    {
        $type = ProductType::where('id',$request->type)->first();
        $newProduct = Product::create([
                'name' => $request->name, 
                'user_id' => auth()->user()->id,
                'price' => $request->price,
                'ammount_in_stock' => $request->instock,
                'instock' => $request->instock > 0?1:0,
                'name' => $request->name,
                'name' => $request->name,
                'main_category_id' => $request->main_category,
                'sub_category_id' => $request->sub_category,
                'productable_type' => $type->model,
                'productable_id' => $type->id,
                'description' => $request->description,
            ]);
        foreach ($request->photos as $photo) {
            $img = Image::make($photo);
            $img->filter(new ImageFilter(1200, 1000));
            $name = "storage/product_photos/".$photo->getClientOriginalName().\Carbon\Carbon::now()->format('Y-m-d-h-i-s').'.jpeg';
            $img->save($name);
            ProductPhoto::create([
                'product_id' => $newProduct->id,
                'path' => $name
            ]);
        }
        return back();
    }
    public function mainCategory()
    {
        $mainCategories = MainCategory::with('photos')->get();
        return view('admin.products.main-category', compact('mainCategories'));
    }
    public function sliderDelete($id)
    {
        Slider::where('id', $id)->delete();
        return back();
    }
    public function storeMainCategory(Request $request)
    {
        $cat = MainCategory::create([
            'name' => $request->name,
            'description' => $request->description
        ]);
        foreach ($request->images as $image) {// 1000247433892 
            // $img = Image::make($image);
            // $img->filter(new ImageFilter(370*2, 216*2));
            // $name = "storage/categoryPhotos/".$image->getClientOriginalName().\Carbon\Carbon::now()->format('Y-m-d-h-i-s').'.jpeg';
            // $img->save($name);
            $name = $image->store('public/categoryPhotos');
            $name = 'storage'.substr($name, 6);
            MainCategoryPhotos::create([
                'main_category_id' => $cat->id,
                'path' => $name
            ]);
        }
        return redirect()->route('admin.product.main-category');
    }
    public function subCategory()
    {
        $subCategories = SubCategory::with('mainCategory')->get();
        $mainCategory = MainCategory::all();
        return view('admin.products.sub-category', compact(['subCategories', 'mainCategory']));
    }
    public function storeSubCategory(Request $request)
    {
        SubCategory::create([
            'name' => $request->name,
            'description' => $request->description,
            'main_category_id' => $request->main_category,
        ]);
        return redirect()->route('admin.product.sub-category');
    }
    public function slider()
    {
        $sliders = Slider::all();
        return view('admin.products.slider', compact('sliders'));
    }
    public function storeSlider(Request $request)
    {
        // $img = Image::make($request->image);
        // $img->filter(new ImageFilter(327*2, 422*2));
        // $name = "storage/sliders/".$request->image->getClientOriginalName().\Carbon\Carbon::now()->format('Y-m-d-h-i-s').'.jpeg';
        // $img->save($name);
        if($request->hasFile('image')){
            $name = $request->image->store('public/sliders');
            $name = 'storage'.substr($name, 6);
        }

        Slider::create([
            'name' => $request->name,
            'description' => $request->description,
            'path' => $name,
            'offer' => $request->offer,
            'category' => $request->category_name,
        ]);
        return redirect()->route('admin.product.slider');
    }
    public function mainCategoryDelete($id)
    {
        MainCategory::where('id' ,$id)->delete();
        MainCategoryPhotos::where('main_category_id', $id)->delete();
        return back();
    }
}
