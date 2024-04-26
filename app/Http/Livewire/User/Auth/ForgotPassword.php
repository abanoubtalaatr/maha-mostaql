<?php

namespace App\Http\Livewire\User\Auth;

use App\Models\User;
use App\Services\SendGridService;
use Livewire\Component;

class ForgotPassword extends Component
{
    public $step = 1;
    public $form;
    public $email;
    public $mobile;
    public $message;
    public $number1 = '', $number2 = '', $number3 = '', $number4 = '';
    public $codeNotValid;
    public $password, $confirmation_password;

    public function incrementStep()
    {
        $this->step++;
    }

    public function sendEmail()
    {
        $this->validate([
            'email' => 'required|email|exists:users,email'
        ]);

        $user = User::query()->whereEmail($this->email)->first();

        $code = rand(9999, 1000);

        $data['code'] = $code;

        $this->sendEmailToUser($data);

        $user->update(['verification_code' => $code]);

        return redirect()->to(route('user.forgot_password_step_2', ['email' => $this->email]));
    }


    public function sendEmailToUser($data)
    {
        (new SendGridService())->sendMail('Verification Email', $this->email, $data, 'emails.auth.sendCode');
    }
    public function render()
    {
        return view('livewire.user.auth.forgot-password-step-1')->layout('layouts.user_auth');
    }
}
