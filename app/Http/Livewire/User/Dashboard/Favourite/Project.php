<?php

namespace App\Http\Livewire\User\Dashboard\Favourite;

use App\Services\FavouriteService;
use Livewire\Component;
use Livewire\WithPagination;

class Project extends Component
{
    public $filter;

    use WithPagination;

    public $paginationTheme = 'bootstrap';

    public function getRecords()
    {
        return (new FavouriteService())->getFavorites("App\Models\Project",auth()->id());
    }

    public function makeFavouriteProject($projectId)
    {
        (new FavouriteService())->makeFavouriteProject($projectId);
        return redirect()->to(route('user.favourites.projects'));
    }

    public function render()
    {
        $favorites = $this->getRecords();

        return view('livewire.user.dashboard.favourites.projects', compact('favorites'))->layout('layouts.user_dashboard');
    }
}
