<?php

namespace App\Http\Livewire\User\Auth;

use App\Models\User;
use App\Services\SendGridService;
use Livewire\Component;

class ForgotPasswordStep2 extends Component
{
    public $form;
    public $email;
    public $message;
    public $codeNotValid;
    public $number1 = '', $number2 = '', $number3 = '', $number4 = '';

    public function mount($email)
    {
        $this->email = $email;
    }

    public function verifyCode()
    {
        $code = $this->number1 . $this->number2 . $this->number3 . $this->number4;

        $user = User::query()->whereEmail($this->email)->first();


        if ($user) {

            if ($user->verification_code == $code) {

                return redirect()->to(route('user.forgot_password_step_3', ['email' => $this->email]));
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
        return view('livewire.user.auth.forgot-password-step-2')->layout('layouts.user_auth');
    }
}
