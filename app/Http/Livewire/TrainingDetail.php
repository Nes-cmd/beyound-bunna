<?php

namespace App\Http\Livewire;

use App\Models\Training;
use App\Models\TrainingBooking;
use Livewire\Component;

class TrainingDetail extends Component
{
    public $training = null;

    public $name;
    public $phone;
    public $email;
    public $adress;
    public $comment;
    public function mount($id)
    {
        $this->training = Training::find($id);

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

        TrainingBooking::create([
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'adress' => $this->adress,
            'training_id' => $this->training->id,
            'user_id' => auth()->check()?auth()->id():null,
        ]);
        $this->emit('makeAlert', ['type' => 'success', 'message' => 'You have booked successfuly!']);
        sleep(4);
        return redirect('trainings');
    }
    public function render()
    {
        return view('livewire.training-detail')
                    ->layout('layouts.customer.app');
    }
}
