<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class EditProfile extends Component
{
    use WithFileUploads;
    public $user;
    public $photo = null;
    protected $rules = [
        'user.first_name' => 'required|string|max:50',
        'user.last_name' => 'required|string|max:50',
        'user.phone' => 'required|string|max:12|min:9',
        'user.email' => 'required|string|max:60|min:9',
        'photo' => 'nullable|file|mimes:jpg,jpeg,png,bmp|max:2048'
    ];
    public function mount()
    {
        $this->user = auth()->user();
    }
    public function update()
    {
        $this->validate();
        if($this->photo){
            $path = $this->photo->store('public/profile');
            $this->user['photo_path'] = substr($path,7);
        }
        $this->user->save();
        return redirect()->route('customer.dashboard.profile');
    }
    public function render()
    {
        return view('customer-shop.dashboard.edit')
                        ->layout('layouts.customer.app');
    }
}
