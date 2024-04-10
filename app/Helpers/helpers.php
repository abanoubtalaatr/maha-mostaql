<?php

namespace App\Helpers;

use App\Constants\RequestDeliverStatus;
use App\Constants\UserTypes;
use App\Models\Proposal;
use Illuminate\Support\Facades\Route;

if (!function_exists('activeUrl')) {
    function activeUrl($routeName)
    {
        return Route::currentRouteName() == $routeName ? 'active' : '';
    }
}

if (!function_exists('isFreelancer')) {
    function isFreelancer()
    {
        return auth()->user()->account_type == UserTypes::FREELANCER;
    }
}

if (!function_exists('isClient')) {
    function isClient()
    {
        return auth()->user()->account_type == UserTypes::CLIENT;
    }
}


