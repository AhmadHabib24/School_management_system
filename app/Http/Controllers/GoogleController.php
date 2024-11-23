<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Google_Client;
use Google_Service_Oauth2;




class GoogleController extends Controller
{
    protected $googleClient;


    public function __construct()
    {
        $this->googleClient = new Google_Client();
        $this->googleClient->setClientId(env('GOOGLE_CLIENT_ID'));
        $this->googleClient->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
        $this->googleClient->setRedirectUri(env('GOOGLE_REDIRECT_URL'));
        $this->googleClient->addScope('email');
        $this->googleClient->addScope('profile');
    }


    public function redirectToGoogle()
    {
        // Redirect to Google's OAuth 2.0 server
        $authUrl = $this->googleClient->createAuthUrl();
        return redirect($authUrl);
    }

    public function handleGoogleCallback(Request $request)
    {
        try {
            // Exchange authorization code for access token
            $accessToken = $this->googleClient->fetchAccessTokenWithAuthCode($request->get('code'));

            // Set access token for the Google client
            $this->googleClient->setAccessToken($accessToken);

            // Fetch user information
            $oauth2 = new Google_Service_Oauth2($this->googleClient);
            $googleUser = $oauth2->userinfo->get();

            // Find or create the user
            $user = User::firstOrCreate(
                ['email' => $googleUser->email],
                [
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'password' => bcrypt(uniqid()),
                    'google_id' => $googleUser->id,
                ]
            );

            // Log the user in
            Auth::login($user);

            return redirect('/dashboard')->with('success', 'Login Successful');
        } catch (\Exception $e) {
            return redirect('/login')->withErrors(['error' => 'Login failed!']);
        }
    }
}
