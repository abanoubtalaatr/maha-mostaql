<?php

namespace App\Http\Livewire\User\Dashboard\MyWorks;

use App\Models\Work;
use App\Services\MyWorkService;
use Livewire\Component;

class Show extends Component
{
    public $work;

    public function mount(Work $work)
    {
        $this->work = $work;

        (new MyWorkService())->increaseViews($work->id);
    }

    public function likeWork()
    {
        (new MyWorkService())->increaseLikes($this->work->id);
    }
    public function destroy()
    {
        $this->work->delete();
        return redirect()->to(route('user.client.my_works.index'));
    }
    public function render()
    {
        return view('livewire.user.dashboard.my-works.show')->layout('layouts.user_dashboard');
    }
}
