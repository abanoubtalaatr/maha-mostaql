<?php

namespace App\Http\Livewire\User\Dashboard\MyWorks;

use Livewire\Component;
use Livewire\WithPagination;
use Symfony\Contracts\Translation\TranslatorTrait;

class Index extends Component
{
    use TranslatorTrait;

    use WithPagination;

    public $paginationTheme = 'bootstrap';

    public function getRecords()
    {
        return auth()->user()->works()->paginate(config('app.per_page'));
    }
    public function render()
    {
        $works = $this->getRecords();

        return view('livewire.user.dashboard.my-works.index', compact('works'))->layout('layouts.user_dashboard');
    }
}
