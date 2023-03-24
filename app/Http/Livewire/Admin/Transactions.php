<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Transaction;

class Transactions extends Component
{
    public $transactions;
    public $selected = 0;
    public $statusUpdate;
    public $viewMode = '%';
    public function mount()
    {
        $this->filter($this->viewMode);
        // dd($this->transactions[0]->other_info);
    }
    public function filter($sel)
    {
        $this->viewMode = $sel;
        $this->transactions = Transaction::where('status','like', $sel)->get();
        $this->render();
    }
    public function render()
    {
        $transactions = $this->transactions;
        return view('livewire.admin.transactions', compact('transactions'))
                    ->layout('layouts.admin.app');
    }
}
