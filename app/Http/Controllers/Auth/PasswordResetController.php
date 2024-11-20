<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;

class PasswordResetController extends Controller
{
    // Show the forget password form
    public function showForgetPasswordForm()
    {
        return view('forgot-password');
    }

    // Send the reset link to the email
    // Send the reset link to the email
    // Send the reset link to the email
    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        try {
            $status = Password::sendResetLink($request->only('email'));

            if ($status === Password::RESET_LINK_SENT) {
                // Redirect to the reset password page with a success message
                return redirect()
                    ->route('check.mail', ['token' => 'check-email-token'])
                    ->with('status', __('A reset link has been sent to your email.'));
            } else {
                // Return back with an error message
                return back()->withErrors(['email' => __($status)]);
            }
        } catch (\Exception $e) {
            // Handle exceptions and return an error message
            return back()->withErrors(['email' => 'An error occurred while sending the reset link. Please try again later.']);
        }
    }
    public function success_message($token)
    {
        return view('message', ['token' => $token]);
    }



    // Show the reset password form
    public function showResetPasswordForm($token)
    {
        return view('reset-password', ['token' => $token]);
    }

    // Handle the reset password process
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        try {
            $status = Password::reset(
                $request->only('email', 'password', 'password_confirmation', 'token'),
                function ($user, $password) {
                    $user->forceFill([
                        'password' => Hash::make($password),
                        'remember_token' => Str::random(60),
                    ])->save();

                    event(new PasswordReset($user));
                }
            );

            if ($status === Password::PASSWORD_RESET) {
                // Redirect to login with a success message in the session
                return redirect()->route('login')->with('status', 'Your password has been reset successfully.');
            } else {
                // Return back with an error message
                return back()->withErrors(['email' => __($status)]);
            }
        } catch (\Exception $e) {
            // Handle exceptions and show a generic error message
            return back()->withErrors(['email' => 'An error occurred while resetting your password. Please try again later.']);
        }
    }
}
