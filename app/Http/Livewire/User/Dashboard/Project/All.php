<?php

namespace App\Http\Livewire\User\Dashboard\Project;

use App\Constants\ProjectStatus;
use App\Models\Project;
use App\Services\FavouriteService;
use Livewire\Component;
use Livewire\WithPagination;
use Symfony\Contracts\Translation\TranslatorTrait;

class All extends Component
{
    use TranslatorTrait;
    use WithPagination;
    public $paginationTheme = 'bootstrap';

    public  $filter;

    public function getRecords()
    {
        return Project::query()
            ->where('status', '!=', ProjectStatus::REVIEW)
            ->when($this->filter, function ($query){
                $query->where('price_from', $this->filter);
            })->paginate(config('app.per_page'));
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

    public function render()
    {
        $projects = $this->getRecords();
        return view('livewire.user.dashboard.projects.all',compact('projects') )->layout('layouts.user_dashboard');
    }
}
