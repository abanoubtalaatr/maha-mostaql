<?php

namespace App\Http\Controllers\Admin;

use App\Constants\UserTypes;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\OilBrand;
use App\Models\Order;
use App\Models\Project;
use App\Models\Service;
use App\Models\Specialty;
use App\Models\User;

class DashboardController extends Controller{
    public function index()
    {
        $totalCountries = Country::query()->count();
        $totalFreelancers = User::query()->where('account_type', UserTypes::FREELANCER)->count();
        $totalClients = User::query()->where('account_type', UserTypes::CLIENT)->count();
        $totalSpecialties = Specialty::query()->count();
        $totalProjects = Project::query()->count();

        return view('admin.dashboard.home', compact([
            'totalCountries',
            'totalFreelancers',
            'totalClients',
            'totalSpecialties',
            'totalProjects',
        ]));
    }
}
