<?php

namespace App\Http\Livewire;

use App\Models\Training;
use Livewire\Component;

class TrainingComponent extends Component
{
    public $trainings;
    public function mount($categoryId = null)
    {
        if($categoryId) $this->trainings = Training::where('category_id', $categoryId)->get();
        else $this->trainings = Training::all();
    }

    public function render()
    {
        return view('livewire.training-component')
            ->layout('layouts.customer.app');
    }
}
