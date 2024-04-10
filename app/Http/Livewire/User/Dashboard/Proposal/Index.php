<?php

namespace App\Http\Livewire\User\Dashboard\Proposal;

use Livewire\Component;
use Symfony\Contracts\Translation\TranslatorTrait;

class Index extends Component
{
    use TranslatorTrait;
    public $projects, $filter;

    public function mount()
    {
        $this->projects =auth()->user()->projects;
    }

    public function updatedFilter()
    {
        $this->projects = auth()->user()->projects()->where('price_from','>=', $this->filter)->get();
    }
    public function render()
    {
        return view('livewire.user.dashboard.projects.index')->layout('layouts.user_dashboard');
    }
}
