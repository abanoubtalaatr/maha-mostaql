<?php

namespace App\Http\Livewire\User;

use App\Models\Setting;
use Livewire\Component;

class faq extends Component
{
    public function render()
    {
        return view('livewire.user.faq',)->layout('layouts.project');
    }
}
