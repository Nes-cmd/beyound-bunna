<?php

namespace App\Http\Livewire;

use App\Models\Subscriber as ModelsSubscriber;
use Livewire\Component;

class Subscriber extends Component
{
    public $email = null;
    public function subscribe()
    {
        if($this->email){
            $this->validate(['email' => 'email']);
            ModelsSubscriber::create(['email' => $this->email]);
            $this->email = '';
            $this->emit('makeAlert', ['type' => 'success', 'message' => 'Thank you for your subscription!']);
        }
    }
    public function render()
    {
        return view('livewire.subscriber');
    }
}
