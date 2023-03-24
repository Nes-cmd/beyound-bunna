<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Wishlist;

class WishlistConponent extends Component
{
    public $wishlists;
    public function mount()
    {
        $this->wishlists = Wishlist::with('products')->where('user_id', auth()->user()->id)->get();
    }
    public function removeWishlist($id)
    {
        Wishlist::where('id', $id)->delete();
        $this->wishlists = Wishlist::with('products')->where('user_id', auth()->user()->id)->get();
        $this->render();
    }
    public function render()
    {
        $wishlists = $this->wishlists;
        return view('livewire.wishlist-conponent', compact('wishlists'))
                        ->layout('layouts.customer.app');
    }
}
