<?php

namespace App\Http\Livewire\User\Dashboard\MyWorks;

use Livewire\Component;
use Symfony\Contracts\Translation\TranslatorTrait;

class Index extends Component
{
    use TranslatorTrait;
    public $works;

    public function mount()
    {
        $this->works =auth()->user()->works;

    }
    public function render()
    {
        return view('livewire.user.dashboard.my-works.index')->layout('layouts.user_dashboard');
    }
}
