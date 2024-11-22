<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class SuperAdminController extends Controller
{
    //
    public function dashboard()
    {
        return view('super-admin.dashboard');
    }

    public function users()
    {
        $users = User::with('roles')->where('role', '!=', 1)->get();
        return view('super-admin.users', compact('users'));
    }

    public function manageRole()
    {
        $users = User::where('role', '!=', 1)->get();
        $roles = Role::all();
        return view('super-admin.manage-role', compact(['users', 'roles']));
    }
    public function managePermission()
    {
        $users = User::where('role', '!=', 1)->get();
        $roles = Role::all();
        return view('super-admin.manage-permission', compact(['users', 'roles']));
    }

    public function updateRole(Request $request)
    {
        User::where('id', $request->user_id)->update([
            'role' => $request->role_id
        ]);
        return redirect()->back();
    }
    

    

    public function updatePermission(Request $request)
{
    $request->validate([
        'user_id' => 'required|exists:users,id',
        'confirmation' => 'required|in:yes,no',
    ]);

    // Log user_id to confirm it
    Log::info('User ID:', ['user_id' => $request->user_id]);

    $user = User::findOrFail($request->user_id);

    // Log user data before updating
    Log::info('User data before update:', ['user' => $user]);

    // Update the user's permission
    $user->update([
        'permission' => $request->confirmation,
    ]);
    // dd($user);

    // Log after update to ensure it's executed
    Log::info('User data after update:', ['user' => $user]);

    // Determine the email content based on the permission
    if ($request->confirmation === 'yes') {
        $subject = 'Profile Approved';
        $body = 'Dear ' . $user->name . ",<br><br>
            Thank you for your patience. Your profile has been approved!<br><br>
            Please log in to your account to update your profile.<br>
            Here is the link to our website: <a href='" . url('/') . "'>" . url('/') . "</a><br><br>
            Regards,<br>
            School Management System Team";
    } else {
        $subject = 'Profile Under Review';
        $body = 'Dear ' . $user->name . ",<br><br>
            Due to some reasons, your profile has been sent for further review.<br><br>
            You will be informed about your status as soon as possible.<br><br>
            Regards,<br>
            School Management System Team";
    }

    // Send the email
    Mail::html($body, function ($message) use ($user, $subject) {
        $message->to($user->email)->subject($subject);
    });

    // Return with success message
    return redirect()->back()->with('success', 'Permission updated and email sent successfully!');
}
    
}
