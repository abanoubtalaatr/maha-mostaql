<?php

namespace App\Http\Livewire\User\Auth;

use App\Models\User;
use App\Models\Country;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Constants\UserTypes;
use Illuminate\Http\Request;
use App\Events\UserRegistered;
use Illuminate\Support\Facades\Event;
use App\Http\Livewire\Traits\ValidationTrait;
use App\Services\SendGridService;

class Signup extends Component
{
    use ValidationTrait;

    public $step = 1;
    public $form;
    public $mobile;
    public $message;

    public $countries;


    public function mount(Request $request)
    {
        if ($request->has('account_type')) {
            if ($request->input('account_type') == 'مستقل') {
                $this->form['account_type'] = UserTypes::FREELANCER;
            } else {
                $this->form['account_type'] = UserTypes::CLIENT;
            }
        }

        $this->countries = Country::query()->get();
    }
    public function store(Request $request)
    {

        $this->validate();

        $verificationToken = Str::random(60);

        $user = User::create(array_merge($this->form, ['verification_code' => $verificationToken]));

        $this->sendVerificationEmail($user);


        return redirect()->to(route('user.login'));
    }


    private function sendVerificationEmail(User $user)
    {
        $verificationLink = route('user.verify', ['user' => $user->id]);

        // Craft email body with verification link
        $emailBody = "Please click the following link to verify your email: $verificationLink";

        // Send email using your preferred email sending method/library
        $data['url'] = $verificationLink;
        // For example, using Laravel's Mail facade:
        (new SendGridService)->sendMail('verify your email', $user->email, $data, 'emails.auth.verify_email');
    }

    public function getRules()
    {
        return [
            'form.first_name' => ['required', 'string', 'min:3', 'max:50'],
            'form.last_name' => ['required'],
            'form.email' => ['required', 'email', 'unique:users,email'],
            'form.password' => ['required', 'min:3'],
            'form.country_id' => ['required', 'exists:countries,id'],
            'form.mobile' => ['required', 'string', 'min:8', 'unique:users,mobile'],
        ];
    }

    public function render()
    {
        return view('livewire.user.auth.sign-up')->layout('layouts.user_auth');
    }
}
