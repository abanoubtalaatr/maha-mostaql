<?php

namespace App\Http\Livewire\User;

use App\Models\Setting;
use Livewire\Component;

class About extends Component
{
    public function render()
    {
        return view('livewire.user.about',)->layout('layouts.project');
    }
}
