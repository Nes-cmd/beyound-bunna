<?php

namespace App\Http\Livewire;

use App\Models\Travel;
use App\Models\TravelBooking;
use Livewire\Component;

class TravelDetail extends Component
{
    public $travel = null;

    public $name;
    public $phone;
    public $email;
    public $adress;
    public $comment;
    public function mount($id)
    {
        $this->travel = Travel::find($id);
        if(auth()->check()){
            $this->name = auth()->user()->first_name .' '. auth()->user()->last_name;
            $this->phone = auth()->user()->phone;
            $this->email = auth()->user()->email;
        }
    }
    public function book()
    {
        $this->validate([
            'name' => 'required',
            'phone' => 'required',
        ]);

        TravelBooking::create([
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'adress' => $this->adress,
            'user_id' => auth()->check()?auth()->id():null,
        ]);
        $this->emit('makeAlert', ['type' => 'success', 'message' => 'You have booked successfuly!']);
        sleep(2);
        return redirect('travel');
    }
    public function render()
    {
        return view('livewire.travel-detail')
                    ->layout('layouts.customer.app');
    }
}
