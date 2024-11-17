<?php
namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class GoogleController extends Controller
{
    // Redirect to Google's OAuth page
    public function redirectToGoogle()
{
    // This will dump the result before redirection

    return Socialite::driver('google')->redirect();
}


    // Handle the callback from Google and log the user in
    public function handleGoogleCallback()
    {
        try {
            // Get the user from Google
            $googleUser = Socialite::driver('google')->user();

            // Create or update the user
            dd($googleUser);
            $user = User::updateOrCreate(
                [
                    'email' => $googleUser->getEmail(),
                ],
                [
                    'name' => $googleUser->getName(),
                    'google_id' => $googleUser->getId(),
                    'photo' => $googleUser->getAvatar(),
                ]
            );

            // Log the user in
            Auth::login($user);

            // Redirect to intended dashboard or home page
            return redirect()->intended('user/dashboard');
        } catch (\Exception $e) {
            return redirect('/login')->withErrors('Error logging in with Google: ' . $e->getMessage());
        }
    }
}
