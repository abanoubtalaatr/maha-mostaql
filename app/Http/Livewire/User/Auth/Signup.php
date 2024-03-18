<?php

namespace App\Http\Livewire\User\Auth;

use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;
use Livewire\Component;
use App\Http\Livewire\Traits\ValidationTrait;
class Signup extends Component
{
    use ValidationTrait;

    public $step = 1 ;
    public $form;
    public $mobile;
    public $message;

    public $countries;


    public function mount(Request $request)
    {
        if($request->has('account_type')){
            if($request->input('account_type') == 'مستقل') {
                $this->form['account_type'] = 'freelancer';
            }else{
                $this->form['account_type'] = 'project_owner';
            }
        }

        $this->countries = Country::query()->get();

    }
    public function store(Request $request)
    {

        $this->validate();

        $user = User::query()->create($this->form);

        return redirect()->to(route('home'));

    }

    public function getRules()
    {
        return [
            'form.first_name' => ['required', 'string', 'min:3','max:50'],
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
