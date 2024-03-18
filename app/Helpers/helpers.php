<?php

namespace App\Helpers;


use App\Models\Opinion;
use Illuminate\Support\Facades\Route;

if (!function_exists('activeUrl')) {
    function activeUrl($routeName)
    {
        return Route::currentRouteName() == $routeName ? 'active' : '';
    }
}


