<?php

namespace App\Http\Livewire\User\Auth;

use App\Http\Livewire\Traits\ValidationTrait;
use App\Models\Country;
use App\Models\Specialty;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads, ValidationTrait;

    public $user, $username, $email, $mobile, $message, $form, $latitude, $longitude;
    public $photo, $avatar;
    public $countries;
    public $specialties;
    public $image, $imageUrl;

    public function mount()
    {
        $this->user = auth('users')->user();
        $this->form = $this->user->toArray();

        $this->countries = Country::query()->get();
        $this->specialties = Specialty::query()->get();
    }

    public function update()
    {
        $this->validate();

        if(isset($this->image)){
            $this->form['avatar'] =
                $this->image?
                    $this->image->storeAs(date('Y/m/d'),Str::random(50).'.'.$this->image->extension(),'public') : null;

        }

        $this->user->update($this->form);
        $this->message = "تم التعديل بنجاح";

        return redirect()->to(route('user.profile'));

    }

    public function getRules()
    {
        return [
            'form.first_name' => ['required', 'string', 'min:3', 'max:50'],
            'form.last_name' => ['required', 'string', 'min:3', 'max:50'],
            'form.email' => ['required', 'email', 'unique:users,email,' . $this->user->id],
            'form.mobile' => ['required', 'unique:users,mobile,' . $this->user->id],
            'form.country_id' => ['required', 'exists:countries,id'],
            'form.specialty_id' => ['required', 'exists:specialties,id'],
            'form.job_title' => ['required', 'min:3', 'max:200'],
            'form.about' => ['required','min:3', 'max:500'],
            'photo' => ['nullable', 'image', 'max:1024'], // Max file size 1MB
        ];
    }

    public function render()
    {
        return view('livewire.user.auth.profile')->layout('layouts.user_dashboard');
    }
}
