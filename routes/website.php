<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
], function () {

    Route::get('/', [\App\Http\Controllers\User\HomeController::class,'index'])->name('home');
    Route::get('page/{page}', \App\Http\Livewire\User\Page::class)->name('page');
    Route::get('/about', \App\Http\Livewire\User\About::class)->name('about');
    Route::get('/faq', \App\Http\Livewire\User\faq::class)->name('faq');
    Route::get('policy', \App\Http\Livewire\User\Policy::class)->name('policy');

    Route::get('slider', \App\Http\Livewire\User\Slider::class)->name('slider');
    Route::view('error', 'livewire.user.error')->name('error');

    Route::get('/login/google', [\App\Http\Controllers\GoogleController::class, 'redirectToGoogle'])->name('login.google');
    Route::get('/login/google/callback', [\App\Http\Controllers\GoogleController::class, 'handleGoogleCallback']);
    Route::get('contact', \App\Http\Livewire\User\ContactUs::class)->name('contact');

    Route::get('project-search', \App\Http\Livewire\User\ProjectSearch::class)->name('projects.search');

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


            //freelancer
            Route::group(['prefix' => 'client', 'as' => 'client.'], function (){
               Route::group(['prefix' => 'my-works', 'as' => 'my_works.'], function (){
                   Route::get('/', \App\Http\Livewire\User\Dashboard\MyWorks\Index::class)->name('index');
                   Route::get('/create', \App\Http\Livewire\User\Dashboard\MyWorks\Create::class)->name('create');
                   Route::get('/{work}', \App\Http\Livewire\User\Dashboard\MyWorks\Show::class)->name('show');
                   Route::get('/{work}/edit', \App\Http\Livewire\User\Dashboard\MyWorks\Edit::class)->name('edit');
               });

                Route::group(['prefix' => 'proposals', 'as' => 'proposals.'], function (){
                    Route::get('/my-proposals', \App\Http\Livewire\User\Dashboard\Proposal\MyProposal::class)->name('my_proposals');
                    Route::get('{project}/create', \App\Http\Livewire\User\Dashboard\Proposal\Create::class)->name('create');

                });
            });

            //owner projects
            Route::group(['prefix' => 'owner', 'as' => 'owner.'], function (){
                Route::group(['prefix' => 'projects', 'as' => 'projects.'], function (){
                    Route::get('/all', \App\Http\Livewire\User\Dashboard\Project\All::class)->name('all');
                    Route::get('/', \App\Http\Livewire\User\Dashboard\Project\Index::class)->name('index');
                    Route::get('/create', \App\Http\Livewire\User\Dashboard\Project\Create::class)->name('create');
                    Route::get('/{project}/edit', \App\Http\Livewire\User\Dashboard\Project\Edit::class)->name('edit');
                    Route::get('/requests-deliver', \App\Http\Livewire\User\Dashboard\Project\RequestsDeliver::class)->name('requests_deliver');
                });

            });

            Route::group(['prefix' => 'shared', 'as'  => 'shared.'], function (){
                Route::group(['prefix' => 'projects', 'as' => 'projects.'], function (){
                    Route::get('/{project}', \App\Http\Livewire\User\Dashboard\Project\Show::class)->name('show');
                });

                Route::get('users/{user}', \App\Http\Livewire\User\Dashboard\User\Detail::class)->name('user.details');
            });

            Route::group(['prefix' => 'favourites', 'as' => 'favourites.'], function (){
                Route::get('/', \App\Http\Livewire\User\Dashboard\Favourite\Project::class)->name('projects');
                Route::get('/users', \App\Http\Livewire\User\Dashboard\Favourite\User::class)->name('users');

            });

        });/*authenticated users*/
    });
});
