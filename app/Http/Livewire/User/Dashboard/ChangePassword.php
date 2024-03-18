<?php

namespace App\Http\Livewire\User\Dashboard;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Symfony\Contracts\Translation\TranslatorTrait;

class ChangePassword extends Component
{
    public $password;
    public $confirmation_password;
    use TranslatorTrait;

    public function change()
    {
        $this->validate();

        $user = User::query()->update(['password' => Hash::make($this->password)]);

        $this->message = 'تم تغير كلمة المرور بنجاح';
        $this->password ='';
        $this->confirmation_password = '';

    }

    public function getRules()
    {
        return [
            'password' => ['required', 'min:6', 'max:12'],
            'confirmation_password' => ['same:password'],
        ];
    }


    public function render()
    {
        return view('livewire.user.dashboard.change-password')->layout('layouts.user_dashboard');
    }
}
