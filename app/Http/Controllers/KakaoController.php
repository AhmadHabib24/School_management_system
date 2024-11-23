<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Str; // Import the Str class

class KakaoController extends Controller
{
    public function redirectToKakao()
    {
        return Socialite::driver('kakao')->redirect();
    }

    public function handleKakaoCallback()
    {
        try {
            $kakaoUser = Socialite::driver('kakao')->user();

            // Find or create the user
            $user = User::firstOrCreate(
                ['email' => $kakaoUser->getEmail()],
                [
                    'name' => $kakaoUser->getName() ?? 'Kakao User',
                    'email' => $kakaoUser->getEmail(),
                    'password' => bcrypt(Str::random(16)), // Use Str::random instead of str_random
                ]
            );

            Auth::login($user);

            return redirect('/dashboard'); // Redirect after login
        } catch (\Exception $e) {
            return redirect('/login')->withErrors(['error' => 'Login failed!']);
        }
    }
}
