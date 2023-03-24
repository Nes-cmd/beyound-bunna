<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class SingleProduct extends Component
{
    public $product;
    public $relatedProducts;
    public $quantity = 1;
    public $specific = [];
    protected $listeners = ['specChanged'];
    public $xyz;
    public function mount($id)
    {
        $this->product = Product::with('attributes')->where('id', $id)->first();
        $this->relatedProducts = Product::where('sub_category_id', $this->product->sub_category_id)
                                          ->whereNotIn('id', [$this->product->id])->limit(4)->get();
    }
    public function specChanged($change)
    {
        $this->specific[$change['name']] = $change['value'];
    }
    public function updated(){
        if($this->quantity <= 0 || $this->quantity == "" ) $this->quantity = 1;
    }
    public function toCart()
    {
        $this->emit('toCart',$this->product->id,$this->quantity, $this->specific);
    }
    public function wishlit($product_id)
    {
        if(!auth()->check()){
            return redirect('login');
        }
        Wishlist::create(['user_id' => auth()->user()->id, 'product_id' => $product_id]);
    }
    public function render()
    {
        $product = $this->product;
        return view('livewire.single-product', compact('product'))
                        ->layout('layouts.customer.app');
    }
}
