<?php

namespace App\Http\Livewire\User\Dashboard\Project;

use Livewire\Component;
use Symfony\Contracts\Translation\TranslatorTrait;
use Livewire\WithPagination;

class Index extends Component
{
    use TranslatorTrait;
    use WithPagination;

    public $paginationTheme = 'bootstrap';
    public $filter;

    public function getRecords()
    {
        return auth()->user()->projects()->latest()->when($this->filter, function ($query){
            $query->where('price_from','>=', $this->filter);
        })->paginate(config('app.per_page'));
    }

    public function render()
    {
        $projects = $this->getRecords();

        return view('livewire.user.dashboard.projects.index', compact('projects'))->layout('layouts.user_dashboard');
    }
}
