<?php

namespace App\Http\Livewire\User\Dashboard\Project;

use App\Services\RequestDeliverService;
use Livewire\Component;
use Symfony\Contracts\Translation\TranslatorTrait;
use Livewire\WithPagination;

class RequestsDeliver extends Component
{
    use TranslatorTrait;
    use WithPagination;

    public $paginationTheme = 'bootstrap';
    public $filter;

    public function getRecords()
    {
        return auth()->user()->projects()->whereHas('proposals', function ($query){
            $query->where('request_to_deliver', 1);
        })->latest()->when($this->filter, function ($query){
            $query->where('price_from','>=', $this->filter);
        })->paginate(config('app.per_page'));
    }

    public function acceptRequest($proposalId)
    {

         (new RequestDeliverService())->acceptRequest($proposalId);
    }

    public function render()
    {
        $projects = $this->getRecords();

        return view('livewire.user.dashboard.requests-deliver.index', compact('projects'))->layout('layouts.user_dashboard');
    }
}
