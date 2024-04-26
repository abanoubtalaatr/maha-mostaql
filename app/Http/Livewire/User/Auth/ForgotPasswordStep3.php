<?php

namespace App\Http\Livewire\User\Auth;

use App\Models\User;
use App\Services\SendGridService;
use Livewire\Component;

class ForgotPasswordStep3 extends Component
{
    public $email;

    public $message;
    public $number1 = '', $number2 = '', $number3 = '', $number4 = '';
    public $codeNotValid;
    public $password, $confirmation_password;

    public function mount($email)
    {
        $this->email =  $email;
    }

    public function resetPassword()
    {
        $this->validate([
            'password'     => ['required', 'string', 'min:3'],
            'confirmation_password' => ['same:password'],
        ]);

        $user = User::query()->whereEmail($this->email)->first();

        $user->update(['password' => $this->password, 'verification_code' =>  null]);

        return redirect()->route('user.login');
    }

    public function render()
    {
        return view('livewire.user.auth.forgot-password-step-3')->layout('layouts.user_auth');
    }
}
