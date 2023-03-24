<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
class SearchComponent extends Component
{
    public $query;
    public $suggestions = [];
    public function updatedQuery()
    {
        $this->suggestions = \DB::table('products')->where('name', 'like', '%'.$this->query.'%')->select('id','name')->get();
    }
    public function search()
    {
        return redirect('shop/list/search/'.$this->query);
    }
    public function render()
    {
        return view('livewire.search-component');
    }
}
