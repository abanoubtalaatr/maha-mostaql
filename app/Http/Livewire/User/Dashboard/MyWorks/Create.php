<?php

namespace App\Http\Livewire\User\Dashboard\MyWorks;

use App\Http\Livewire\Traits\ValidationTrait;
use App\Models\Work;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use ValidationTrait;

    use WithFileUploads;

    public $form, $image, $imageUrl;

    public function store()
    {
        $this->validate();

        $this->form['user_id'] = auth()->id();

        $this->validate([
            'image' => 'image|max:1024', // Max file size of 1MB
        ]);

        $this->form['image'] =
            $this->image?
                $this->image->storeAs(date('Y/m/d'),Str::random(50).'.'.$this->image->extension(),'public') : null;

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

    public function updatedImage()
    {
        // Update the image preview URL
        $this->imageUrl = $this->image->temporaryUrl();
    }


    public function render()
    {
        return view('livewire.user.dashboard.my-works.create')->layout('layouts.user_dashboard');
    }
}
