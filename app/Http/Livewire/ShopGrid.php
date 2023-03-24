<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShopGrid extends Component
{
    protected $prd;
    public function mount($products)
    {
        $this->prd = $products;
    }
    public function render()
    {
        $products = $this->prd;
        return view('livewire.shop-grid', compact('products'));
    }
}
