<?php

namespace App\Http\Livewire\User\Dashboard\Proposal;

use App\Http\Livewire\Traits\ValidationTrait;
use App\Models\Work;
use Illuminate\Support\Arr;
use Livewire\Component;

class Edit extends Component
{
    use ValidationTrait;

    public $form;

    public function mount(Work $work)
    {
        $this->form = Arr::except($work->toArray(),['user_id', 'created_at', 'id']);
    }

    public function store()
    {
        $this->validate();

        Work::query()->update($this->form);

        return redirect()->route('user.client.my_works.index');
    }

    public function getRules()
    {
        return [
            'form.title' => ['required', 'string', 'min:3', 'max:200'],
            'form.link' => ['nullable', 'url'],
            'form.invoke_date' => ['required', 'date'],
            'form.description' => ['required', 'string', 'min:3', 'max:5000'],
            'form.image' => ['nullable'],
        ];
    }

    public function render()
    {
        return view('livewire.user.dashboard.my-works.edit')->layout('layouts.user_dashboard');
    }
}
