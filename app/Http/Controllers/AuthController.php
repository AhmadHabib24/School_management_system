<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    //
    public function loadRegister()
    {
        $role = Role::all();
        if (Auth::user()) {
            $route = $this->redirectDash();
            return redirect($route)->with($role);
        }
        return view('register');
    }
    public function pendingview()
    {
        return view('pendingmessage');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'string|required|min:2',
            'email' => 'string|email|required|max:100|unique:users',
            'password' => 'string|required|confirmed|min:6',
            'role' => 'required',
        ]);
        $role = Role::where('name', $request->role)->first();

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $role->id;
        $user->save();

        return redirect('login')->with('success', 'Your Registration has been successfull.');
    }

    public function loadLogin()
    {
        if (Auth::user()) {
            $route = $this->redirectDash();
            return redirect($route);
        }
        return view('login');
    }

    public function login(Request $request)
    {
        // Validate the input
        $request->validate([
            'email' => 'string|required|email',
            'password' => 'string|required',
            'remember' => 'nullable', // Optional "Remember Me" field
        ]);
        // dd($request);
        // Extract credentials and remember flag
        $userCredential = $request->only('email', 'password');
        $remember = $request->has('remember'); // Check if "Remember Me" is selected

        // Attempt to authenticate with "Remember Me"
        if (Auth::attempt($userCredential, $remember)) {
            $route = $this->redirectDash(); // Redirect to the appropriate dashboard
            return redirect($route)->with('success', 'Login Successful!');
        } else {
            return back()->with('error', 'Username & Password is incorrect');
        }
    }


    public function loadDashboard()
    {
        return view('user.dashboard');
    }


    public function redirectDash()
    {
        $redirect = '';

        if (Auth::user() && Auth::user()->role == 1) {
            if (Auth::user()->permission == 'yes') {
                $redirect = '/super-admin/dashboard';
            } else {
                $redirect = '/request-pending';
            }
        } else if (Auth::user() && Auth::user()->role == 2) {
            if (Auth::user()->permission == 'yes') {
                $redirect = '/sub-admin/dashboard';
            } else {
                $redirect = '/request-pending';
            }
        } else if (Auth::user() && Auth::user()->role == 3) {
            if (Auth::user()->permission == 'yes') {
                $redirect = '/admin/dashboard';
            } else {
                $redirect = '/request-pending';
            }
        } else {
            $redirect = '/dashboard';
        }

        return $redirect;
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect('/');
    }
    public function reset_password()
    {
        return view('forgot-password');
    }
}
