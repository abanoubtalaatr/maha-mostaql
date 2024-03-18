<?php

namespace App\Http\Livewire\User\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Symfony\Contracts\Translation\TranslatorTrait;

class Login extends Component
{
    public $email;
    public $password;
    public $message;
    use TranslatorTrait;

    public function attempt()
    {
        $this->validate();
        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        if (Auth::attempt($credentials)) {
            // Authentication was successful
            return redirect()->to(route('user.profile'));
        } else {
            // Authentication failed
            $this->message = 'بيانات غير صحيحة برجاء المحاولة مرة اخري';
        }
    }

    public function getRules()
    {
        return [
            'email' => ['required', 'email'],
            'password' => ['required']
        ];
    }


    public function render()
    {
        return view('livewire.user.auth.login')->layout('layouts.user_auth');
    }
}
