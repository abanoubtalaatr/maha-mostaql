<?php

namespace App\Http\Livewire\User\Dashboard\Proposal;

use App\Models\Work;
use Livewire\Component;

class Show extends Component
{
    public $work;

    public function mount(Work $work)
    {
        $this->work = $work;
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
