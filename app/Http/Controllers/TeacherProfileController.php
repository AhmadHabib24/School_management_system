<?php

namespace App\Http\Controllers;

use App\Models\TeacherProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TeacherProfileController extends Controller
{
    /**
     * Store teacher profile data.
     */
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'nick_name' => 'nullable|string|max:255',
            'certificate' => 'nullable|file|image|max:2048', // Allow image files up to 2MB
            'about_me' => 'nullable|string',
            'class_strength' => 'nullable|string|max:255',
            'teaching_style' => 'nullable|array', // Allow an array for teaching style
            'teaching_style.*' => 'string|max:255',
        ]);

        try {
            // Handle certificate file upload
            $certificatePath = null;
            if ($request->hasFile('certificate')) {
                // Save file to 'public/teacher-profile' directory
                $certificatePath = $request->file('certificate')->store('teacher-profile', 'public');
                // Generate full URL for the saved file
                $certificatePath = asset('storage/' . $certificatePath);
                Log::info("Certificate uploaded: " . $certificatePath); // Log the file path for debugging
            }

            // Save the teacher profile data
            TeacherProfile::create([
                'role_id' => Auth::user()->role_id, // Assuming role_id is part of the User model
                'user_id' => Auth::id(),
                'name' => $request['name'],
                'nick_name' => $request['nick_name'] ?? null,
                'certificate' => $certificatePath,
                'about_me' => $request['about_me'] ?? null,
                'class_strength' => $request['class_strength'] ?? null,
                'teaching_style' => $request['teaching_style'] ? json_encode($request['teaching_style']) : null,
            ]);

            return redirect()->back()->with('success', 'Teacher profile saved successfully!');
        } catch (\Exception $e) {
            Log::error("Error storing teacher profile: " . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Failed to save teacher profile. Please try again.']);
        }
    }
}
