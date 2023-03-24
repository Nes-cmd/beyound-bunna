<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Wishlist as Wishs;

class Wishlist extends Component
{
    public $lists;
    public $list_size;
    public function mount()
    {
        // $this->lists = Wishs::with('products','products.productPhotos')->where('user_id', auth()->user()->id)->get();
        // $this->list_size = sizeof($this->lists);
        // dd($this->lists);
    }
    public function render()
    {
        return view('livewire.wishlist');
    }
}
