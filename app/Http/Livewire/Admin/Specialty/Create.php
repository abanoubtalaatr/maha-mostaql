<?php

namespace App\Http\Livewire\Admin\Specialty;

use App\Models\Country;
use App\Models\Specialty;
use App\Models\User;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Http\Livewire\Traits\ValidationTrait;

class Create extends Component
{
    use WithFileUploads, ValidationTrait;

    public $form;
    public $image;

    public function mount()
    {
        $this->page_title = __('admin.specialties');
    }

    public function store()
    {
        $this->validate();

        Specialty::create($this->form);
        session()->flash('success',__('admin.create_successfully'));

        return redirect()->to(route('admin.specialties.index'))->with('message', __('admin.country_created_successfully'));
    }

    public function getRules()
    {
        return [
            'form.name' => 'required|min:3',
        ];
    }

    public function render()
    {
        return view('livewire.admin.specialties.create')->layout('layouts.admin');
    }
}
