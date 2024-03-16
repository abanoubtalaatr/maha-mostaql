<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class PaymentSuccess extends Component
{
    public function render()
    {
        return view('livewire.user.payment-success')->layout('layouts.user');
    }
}
