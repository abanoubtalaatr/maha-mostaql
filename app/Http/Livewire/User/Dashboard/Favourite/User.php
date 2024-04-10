<?php

namespace App\Http\Livewire\User\Dashboard\Favourite;

use App\Services\FavouriteService;
use Livewire\Component;
use Livewire\WithPagination;

class User extends Component
{
    public  $filter;

    use WithPagination;

    public $paginationTheme = 'bootstrap';

    public function getRecords()
    {
        return (new FavouriteService())->getFavorites("App\Models\User",auth()->id());
    }

    public function makeUserFavourite($userId)
    {
        (new FavouriteService())->makeFavouriteUser($userId);
        return redirect()->to(route('user.favourites.users'));
    }


    public function render()
    {
        $favorites = $this->getRecords();

        return view('livewire.user.dashboard.favourites.users', compact('favorites'))->layout('layouts.user_dashboard');
    }
}
