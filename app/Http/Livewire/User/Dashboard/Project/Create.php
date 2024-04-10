<?php

namespace App\Http\Livewire\User\Dashboard\Project;

use App\Constants\ProjectStatus;
use App\Http\Livewire\Traits\ValidationTrait;
use App\Models\Project;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use ValidationTrait;
    use WithFileUploads;

    public $form, $price, $image, $imageUrl;

    public function store()
    {
        $this->validate();

        $priceAfterExplode = explode('-', $this->price);

        $this->validate([
            'image' => 'image|max:1024', // Max file size of 1MB
        ]);

        $this->form['image'] =
            $this->image?
                $this->image->storeAs(date('Y/m/d'),Str::random(50).'.'.$this->image->extension(),'public') : null;

        $priceFrom = $priceAfterExplode[0];
        if(isset($priceAfterExplode[1])){
            $priceTo = $priceAfterExplode[1];
        }else{
            $priceTo  =0;
        }

        $this->form['price_from'] = $priceFrom;
        $this->form['price_to'] = $priceTo;


        $this->form['user_id'] = auth()->id();

        $this->form['status'] = ProjectStatus::REVIEW;

        Project::query()->create($this->form);

        return redirect()->route('user.owner.projects.index');
    }

    public function updatedImage()
    {
        // Update the image preview URL
        $this->imageUrl = $this->image->temporaryUrl();
    }


    public function getRules()
    {
        return [
            'form.title' => ['required', 'string', 'min:3', 'max:200'],
            'form.link' => ['nullable', 'url'],
            'form.period' => ['required', 'min:1', 'max:1000'],
            'form.description' => ['required', 'string', 'min:3', 'max:5000'],
            'form.image' => ['nullable'],
            'price' => ['required']
        ];
    }

    public function render()
    {
        return view('livewire.user.dashboard.projects.create')->layout('layouts.user_dashboard');
    }
}
