<?php

namespace App\Http\Livewire\User\Dashboard\Proposal;

use App\Services\FavouriteService;
use App\Services\ProposalService;
use Livewire\Component;
use Livewire\WithPagination;

class MyProposal extends Component
{
    use WithPagination;

    public  $filter, $status, $created_at;

    public $paginationTheme = 'bootstrap';

    public function getRecords()
    {
        return auth()->user()->proposals()->when($this->status, function ($query){
            $query->where('status', $this->status);
        })->when($this->created_at, function ($query){
            $query->orderBy('created_at', $this->created_at);
        })->latest()->paginate(config('app.per_page'));
    }

    public function makeFavourite($projectId)
    {
        $favourite = (new FavouriteService())->projectIsFavourite($projectId, auth()->id());

        if(!$favourite){
            (new FavouriteService())->create($projectId, auth()->id());
        }else{
            (new FavouriteService())->delete($projectId, auth()->id());
        }
    }


    public function requestToDeliverProposal($proposalId)
    {
        (new ProposalService())->requestToDeliverProposal($proposalId);
    }

    public function render()
    {
        $proposals = $this->getRecords();

        return view('livewire.user.dashboard.proposals.my_proposals', compact('proposals'))->layout('layouts.user_dashboard');
    }
}
