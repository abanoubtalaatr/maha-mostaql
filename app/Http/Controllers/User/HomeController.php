<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Slider;

class HomeController extends Controller{

    public function index()
    {
        $sliders = Slider::query()->active()->get();

        $countries = Country::query()->get();
        return view('welcome', compact('sliders','countries'));
    }
}
