<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Front\ContactUs;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\Admin\Pages\Edit as PagesEdit;
use App\Http\Livewire\Admin\Pages\Index as PagesIndex;
use App\Http\Livewire\Admin\Settings as SettingsIndex;
use App\Http\Livewire\Admin\Slider\Edit as SliderEdit;
use App\Http\Livewire\Admin\Pages\Create as PagesCreate;
use App\Http\Livewire\Admin\Pages\Delete as PagesDelete;
use App\Http\Livewire\Admin\Slider\Index as SliderIndex;
use App\Http\Livewire\Admin\Slider\Create as SliderCreate;
use App\Http\Livewire\Admin\Slider\Delete as SliderDelete;
use App\Http\Livewire\Admin\Role\Index as RoleIndex;
use App\Http\Livewire\Admin\Role\Edit as RoleEdit;
use App\Http\Livewire\Admin\Role\Create as RoleCreate;
use App\Http\Livewire\Admin\Admins\Index as AdminIndex;
use App\Http\Livewire\Admin\Admins\Edit as AdminEdit;
use App\Http\Livewire\Admin\Admins\Create as AdminCreate;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;


Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
], function () {

//    Route::get('/', [HomeController::class, 'index'])->name('homepage');
    Route::get('contact-us', ContactUs::class)->name('contact_us');
    Route::get('page/{page}', [HomeController::class, 'showPage'])->name('show_page');


    //Admin
    Route::group(['as' => 'admin.', 'prefix' => 'admin'], function () {

        Route::get('login', \App\Http\Livewire\Admin\Auth\Login::class)->name('login_form')->middleware('checkAdminIsLogin');
        Route::get('forget-password', \App\Http\Livewire\Admin\Auth\ForgotPassword::class)->name('forgot_password');
        Route::get('verify-forget-password/{admin}', \App\Http\Livewire\Admin\Auth\VerifyForgetPasswordCode::class)
            ->name('verify_forget_password_code')
            ->middleware('checkAdminIsLogin');

        Route::group(['middleware' => 'auth:admin'], function () {
            Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
            Route::get('profile', \App\Http\Livewire\Admin\Profile::class)->name('profile');
            Route::get('logout', [AdminAuthController::class, 'logout'])->name('logout');

            // admins
            Route::get('admins', AdminIndex::class)->middleware('can:Manage admins')->name('admins.index');
            Route::get('admins/{admin}/edit', AdminEdit::class)->middleware('can:Manage admins')->name('admins.edit');
            Route::get('/admins/create', AdminCreate::class)->middleware('can:Manage admins')->name('admins.create');

            //roles
            Route::get('role/index', RoleIndex::class)->middleware('can:Manage roles')->name('role');
            Route::get('role/create', RoleCreate::class)->middleware('can:Manage roles')->name('create_role');
            Route::get('role/{role}/edit', RoleEdit::class)->middleware('can:Manage roles')->name('edit_role');

            Route::get('users', \App\Http\Livewire\Admin\Users\Index::class)->middleware("can:Manage users")->name('users.index');
            Route::get('users/{user}/edit', \App\Http\Livewire\Admin\Users\Edit::class)->middleware("can:Manage users")->name('users.edit');
            Route::get('/users/create',\App\Http\Livewire\Admin\Users\Create::class )->name('create_user');

            //projects
            Route::get('projects', \App\Http\Livewire\Admin\Project\Index::class)->name('projects');
            Route::get('projects/{project}', \App\Http\Livewire\Admin\Project\Show::class)->middleware('can:Manage projects')->name('projects.show');

            // request withdraws
            Route::get('request-withdraws', App\Http\Livewire\Admin\RequestWithdraw\Index::class)->name("request_withdraws");
            //countries
            Route::get('countries', \App\Http\Livewire\Admin\Country\Index::class)->name('countries.index');
            Route::get('countries/create', \App\Http\Livewire\Admin\Country\Create::class)->name('countries.create');
            Route::get('countries/{country}/edit', \App\Http\Livewire\Admin\Country\Edit::class)->name('countries.edit');

            //specialties
            Route::get('specialties', \App\Http\Livewire\Admin\Specialty\Index::class)->name('specialties.index');
            Route::get('specialties/create', \App\Http\Livewire\Admin\Specialty\Create::class)->name('specialties.create');
            Route::get('specialties/{specialty}/edit', \App\Http\Livewire\Admin\Specialty\Edit::class)->name('specialties.edit');

            // contact
            Route::get('contact', App\Http\Livewire\Admin\Contact\Index::class)->name('contacts');
            Route::get('contact/{contact}', \App\Http\Livewire\Admin\Contact\Show::class)->name('contact.show');

            Route::get('slider/index', SliderIndex::class)->name('slider');
            Route::get('slider/create', SliderCreate::class)->name('create_slider');
            Route::get('slider/{slider}/edit', SliderEdit::class)->name('edit_slider');
            Route::get('slider/{slider}/delete', SliderDelete::class)->name('delete_slider');

            Route::get('page/index', PagesIndex::class)->name('pages.index');
            Route::get('page/create', PagesCreate::class)->name('pages.create');
            Route::get('page/{page}/edit', PagesEdit::class)->name('pages.edit');
            Route::get('page/{page}/delete', PagesDelete::class)->name('pages.delete');

            Route::get('opinions', \App\Http\Livewire\Admin\Opinion\Index::class)->middleware('can:Manage services')->name('opinions');
            Route::get('opinions/create', \App\Http\Livewire\Admin\Opinion\Create::class)->middleware('can:Manage services')->name('create_opinions');
            Route::get('opinions/{opinion}/edit', \App\Http\Livewire\Admin\Opinion\Edit::class)->middleware('can:Manage services')->name('edit_opinions');


            Route::get('settings', SettingsIndex::class)->name('settings');

            Route::get('notifications', \App\Http\Livewire\Admin\Notifications::class )->name('notifications');
        });
    });
});

Route::get('payment', function (\Illuminate\Http\Request $request){
    $userId = $request->input('us');
    $amount = $request->input('amount');
    $status = \App\Constants\WalletStatus::CAN_DRAW_WIDTH;
    $walletType = \App\Constants\WalletType::CHARGE;
    (new \App\Services\WalletService())->create(null,$userId,$amount, $status,$walletType);
    return redirect()->to(\route('user.request_withdraws'));
});
require __DIR__ . '/website.php';

