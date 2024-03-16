<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class PaymentFail extends Component
{
    public function render()
    {
        return view('livewire.user.payment-fail')->layout('layouts.user');
    }
}
