<?php

namespace App\Http\Livewire\User\Dashboard\Project;

use App\Models\Project;
use App\Models\Work;
use App\Services\ProposalService;
use Livewire\Component;

class Show extends Component
{
    public $project;

    public function mount(Project $project)
    {
        $this->project = $project;
    }

    public function acceptProposal($proposalId)
    {
        (new ProposalService())->acceptProposal($proposalId);
    }

    public function render()
    {
        return view('livewire.user.dashboard.projects.show')->layout('layouts.user_dashboard');
    }
}
