<?php

namespace App\Http\Livewire\Admin\Country;

use App\Models\Country;
use Illuminate\Support\Str;
use Livewire\Component;
use Illuminate\Support\Arr;
use Livewire\WithFileUploads;
use App\Http\Livewire\Traits\ValidationTrait;

class Edit extends Component
{
    use WithFileUploads, ValidationTrait;

    public $form;
    public $country;

    public function mount(Country $country)
    {
        $this->page_title = __('admin.edit');
        $this->country = $country;
        $this->form = Arr::except($country->toArray(), ['updated_at', 'created_at', 'id']);
    }

    public function update()
    {

        $this->validate();

        $this->country->update($this->form);
        session()->flash('success',__('admin.edit_successfully'));

        return redirect()->to(route('admin.countries.index'))->with('message', __('admin.country_edited_successfully'));
    }


    public function getRules()
    {
         return [
             'form.name' => 'required|min:3',
         ];
    }

    public function render()
    {
        return view('livewire.admin.countries.edit')->layout('layouts.admin');
    }
}
