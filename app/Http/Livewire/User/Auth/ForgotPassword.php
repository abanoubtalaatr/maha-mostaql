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

        $this->step++;
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
    public function verifyCode()
    {
        $code = $this->number1 . $this->number2 . $this->number3 . $this->number4;

        $user = User::query()->whereEmail($this->email)->first();


        if ($user) {
            if ($user->verification_code == $code) {
                $this->step++;
            } else {
                $this->codeNotValid = "كود غير صالح ,  تآكد انك تكتب من اليمين الي اليسار ";
                return 0;
            }
        } else {
            $this->codeNotValid = "كود غير صالح ";
            return 0;
        }
    }

    public function sendEmailToUser($data)
    {
        (new SendGridService())->sendMail('Verification Email', $this->email, $data, 'emails.auth.sendCode');
    }
    public function render()
    {
        return view('livewire.user.auth.forgot-password')->layout('layouts.user_auth');
    }
}
