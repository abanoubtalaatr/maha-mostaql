<?php

use App\Services\UrWayService;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\NotificationController;

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
], function () {

    Route::get('/', [\App\Http\Controllers\User\HomeController::class,'index'])->name('home');
    Route::get('page/{page}', \App\Http\Livewire\User\Page::class)->name('page');
    Route::get('/services', \App\Http\Livewire\User\Service\Index::class)->name('services.index');
    Route::get('/services/{service}', \App\Http\Livewire\User\Service\Show::class)->name('services.show');
    Route::get('/about', \App\Http\Livewire\User\About::class)->name('about');

    Route::view('error', 'livewire.user.error')->name('error');

    Route::get('/login/google', [\App\Http\Controllers\GoogleController::class, 'redirectToGoogle'])->name('login.google');
    Route::get('/login/google/callback', [\App\Http\Controllers\GoogleController::class, 'handleGoogleCallback']);
    Route::get('contact', \App\Http\Livewire\User\ContactUs::class)->name('contact');

    Route::group(['as' => 'user.', 'prefix' => 'user/'], function () {
        Route::get('login', \App\Http\Livewire\User\Auth\Login::class)->name('login')->middleware('checkUserIsLogin');
        Route::get('forgot-password', \App\Http\Livewire\User\Auth\ForgotPassword::class)->middleware('checkUserIsLogin')->name('forgot_password');
        Route::get('sign-up', \App\Http\Livewire\User\Auth\Signup::class)->middleware('checkUserIsLogin')->name('signup');
        Route::get('sign-up-as', \App\Http\Livewire\User\Auth\SignupAs::class)->middleware('checkUserIsLogin')->name('signupas');

        Route::group(['middleware' => 'auth'], function () {
            Route::get('notifications', \App\Http\Livewire\User\Notification::class)->name('notifications');
            Route::get('logout', \App\Http\Livewire\User\Auth\Logout::class)->name('logout');
            Route::get('profile', \App\Http\Livewire\User\Auth\Profile::class)->name('profile');
            Route::get('change-password', \App\Http\Livewire\User\Dashboard\ChangePassword::class)->name('change_password');


            Route::group(['prefix' => 'client', 'as' => 'client.'], function (){
               Route::group(['prefix' => 'my-works', 'as' => 'my_works.'], function (){
                   Route::get('/', \App\Http\Livewire\User\Dashboard\MyWorks\Index::class)->name('index');
                   Route::get('/create', \App\Http\Livewire\User\Dashboard\MyWorks\Create::class)->name('create');
                   Route::get('/{work}', \App\Http\Livewire\User\Dashboard\MyWorks\Show::class)->name('show');
                   Route::get('/{work}/edit', \App\Http\Livewire\User\Dashboard\MyWorks\Edit::class)->name('edit');
               });
            });

        });/*authenticated users*/


    });
});
