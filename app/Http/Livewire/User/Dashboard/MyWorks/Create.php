<?php

namespace App\Http\Livewire\User\Dashboard\MyWorks;

use App\Http\Livewire\Traits\ValidationTrait;
use App\Models\Work;
use Livewire\Component;

class Create extends Component
{
    use ValidationTrait;

    public $form;

    public function store()
    {
        $this->validate();

        $this->form['user_id'] = auth()->id();

        Work::query()->create($this->form);

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
        return view('livewire.user.dashboard.my-works.create')->layout('layouts.user_dashboard');
    }
}
