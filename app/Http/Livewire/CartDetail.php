<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cupon;
class CartDetail extends Component
{
    public $cart;
    public $promocode;
    public function mount()
    {
        $this->cart = session()->get('cart');
    }
    public function updated($cart)
    {   
        //This is to protect if the user leaves the input field with out entering any thing 
        foreach($this->cart as $key => $cart){
            if(!$cart['quantity'] || $cart['quantity'] < 1){ //checking emptyness of the field?
                $affected = $this->cart[$key];
                $affected['quantity'] = 1;//Reverting to 1
                $this->cart->forget($key);
                $this->cart->put($key, $affected);
            }
        }
        if(isset($this->promocode) && $this->promocode != null){
            $this->applyCupon();
        }
    }
    public function applyCupon()
    {
        $this->validate(['promocode' => 'required']);
        $code = Cupon::where('code', $this->promocode)->where('expire_at', '>', now())->first();
        if($code != null){
            $limit = $code->max_limit;
            if($limit == -1 || $limit > $code->count ){
                $type = $code->type;
                $cart = session()->get('cart');
                foreach($cart as $key => $pr){
                    $affect = $cart[$key];
                    $affect['promo_discount'] = $type == 'fixed'?$code->discount: $affect['price'] * $code->discount/100 ;
                    $cart[$key] = $affect;
                }
                session()->put(['cart' => $cart]);
                $this->cart = $cart;
                $this->render();
            }
        }
    }
    public function removeCart($id)
    {
        $cart = $this->cart;
        $cart = $cart->forget($id);
        session()->put('cart', $cart);
        $this->cart = $cart;
        $this->emit('cartSize');
        $this->emit('makeAlert', ['message' => 'Product is removed!','type' => 'warning']);
        $this->render();
    }
    public function increment($id)
    {
        $cart = $this->cart;
        $candidate = $cart[$id];
        $candidate['quantity'] = $candidate['quantity'] + 1;
        // $cart->forget($id);
        $cart->put($id, $candidate);
        session()->put('cart', $cart);
        $this->cart = $cart;
        
    }
    public function decrement($id)
    {
        $cart = $this->cart;
        $candidate = $cart[$id];
        $candidate['quantity'] = $candidate['quantity'] - 1;
        if($candidate['quantity'] == 0){
            $candidate['quantity'] = 1;
        }
        // $cart->forget($id);
        $cart->put($id, $candidate);
        session()->put('cart', $cart);
        $this->cart = $cart;
    }
    public function render()
    {
        $carts = $this->cart;
        return view('livewire.cart-detail', compact('carts'))
                    ->layout('layouts.customer.app');
    }
}
