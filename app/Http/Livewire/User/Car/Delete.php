<?php

namespace App\Http\Livewire\User\Car;

use App\Models\Car;
use Livewire\Component;

class Delete extends Component
{
    public $message = '';
    public function mount(Car $car)
    {
        if($car->orders->count() > 0){
            session()->flash('message', trans('site.can_not_delete_this_car'));
            return redirect()->to(route('user.cars'));
        }else{
            $car->delete();
            return redirect()->to(route('user.cars'));
        }
    }
}
