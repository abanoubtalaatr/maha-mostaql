<?php

namespace App\Http\Livewire\User;

use App\Models\Setting;
use Livewire\Component;

class Slider extends Component
{
    public function render()
    {
        return view('livewire.user.slider',)->layout('layouts.project');
    }
}
