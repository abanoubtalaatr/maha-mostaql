<?php

namespace App\Http\Livewire\User\Dashboard\User;

use App\Http\Livewire\Traits\ValidationTrait;
use App\Models\User;
use App\Services\FavouriteService;
use Livewire\Component;

class Detail extends Component
{
    use ValidationTrait;

    public $user;

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function addToFavorite($userId)
    {
        (new FavouriteService())->createUser($userId, auth()->id());
    }
    public function render()
    {
        return view('livewire.user.dashboard.user.details')->layout('layouts.user_dashboard');
    }
}
