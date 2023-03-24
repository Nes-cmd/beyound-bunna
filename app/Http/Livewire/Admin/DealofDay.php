<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\SpecialProduct;
use App\Models\Product;

class DealofDay extends Component
{
    public $products;
    public $specials;
    public $new;
    public $status = [];
    public function mount()
    {
        $this->products = Product::where('instock', '!=', 0)->get();
        $this->specials = SpecialProduct::all();
    }
    public function updatedStatus()
    {
        dd($this->status);
    }
    public function delete()
    {
        dd($this->status);
    }
    public function specialStore()
    {
        dd($this->new);
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
    public function render()
    {
        $products = $this->products;
        $specials = $this->specials;
        return view('livewire.admin.dealof-day', compact(['specials', 'products']))
                    ->layout('layouts.admin.app');
    }
}
