<?php

namespace App\Http\Livewire;

use App\Models\Travel;
use Livewire\Component;

class TravelComponent extends Component
{
    public $travels = [];
    public $recentTravels = [];
    public function mount()
    {
        $this->travels = Travel::all();
        $this->recentTravels = Travel::all();   
    }
    public function render()
    {
        return view('livewire.travel-component')
                    ->layout('layouts.customer.app');
    }
}
