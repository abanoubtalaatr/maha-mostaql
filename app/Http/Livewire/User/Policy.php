<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class Policy extends Component
{
    public function render()
    {
        return view('livewire.user.policy',)->layout('layouts.project');
    }
}
