<?php

namespace App\Http\Livewire\Admin\Specialty;

use App\Models\Country;
use App\Models\Specialty;
use Illuminate\Support\Str;
use Livewire\Component;
use Illuminate\Support\Arr;
use Livewire\WithFileUploads;
use App\Http\Livewire\Traits\ValidationTrait;

class Edit extends Component
{
    use WithFileUploads, ValidationTrait;

    public $form;
    public $specialty;

    public function mount(Specialty $specialty)
    {
        $this->page_title = __('admin.edit');
        $this->specialty = $specialty;
        $this->form = Arr::except($specialty->toArray(), ['updated_at', 'created_at', 'id']);
    }

    public function update()
    {

        $this->validate();

        $this->specialty->update($this->form);
        session()->flash('success',__('admin.edit_successfully'));

        return redirect()->to(route('admin.specialties.index'))->with('message', __('admin.country_edited_successfully'));
    }


    public function getRules()
    {
         return [
             'form.name' => 'required|min:3',
         ];
    }

    public function render()
    {
        return view('livewire.admin.specialties.edit')->layout('layouts.admin');
    }
}
