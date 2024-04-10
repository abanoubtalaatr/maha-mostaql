<?php

namespace App\Http\Controllers;

use App\Constants\UserTypes;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            // Check if the user already exists in your database
            $user = User::where('email', $googleUser->email)->first();

            if (!$user) {
                // Create a new user record if the user does not exist
                $user = User::create([
                    'first_name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'type' => UserTypes::FREELANCER,
                    // Add other necessary fields as per your User model
                ]);
            }

            // Log in the user
            Auth::login($user, true);

            // Redirect the user to the desired page
            return redirect()->route('user.profile');
        } catch (\Exception $e) {
            // Handle the exception, in this case, redirecting to a 404 page
            return redirect()->route('error');
        }
    }

}
