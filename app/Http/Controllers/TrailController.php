<?php

namespace App\Http\Controllers;

use App\Models\FreeTrial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TrailController extends Controller
{
    public function index()
    {
        return view('Trail.trailform');
    }
    public function dashboard()
    {
        return view('Trail.trail-dashboard');
    }
    public function store(Request $request)
    {
        try {
            // Prepare the data to insert
            $data = [
                'name' => $request->input('name'),
                'english_name' => $request->input('english_name'),
                'age' => $request->input('age'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
                'gender' => $request->input('gender'),
                'introduction' => $request->input('introduction'),
                'class_date' => $request->input('class_date'),
                'time' => $request->input('time'),
                'requests' => $request->input('requests'),
                'signup_path' => $request->input('signup_path'),
                'coupon' => $request->input('coupon'),
                'created_at' => now(),
                'updated_at' => now(),
            ];
    
            // Log the data to ensure it is correct
            Log::info('Inserting Free Trial Data: ', $data);
    
            // Try inserting data
            DB::table('free_trials')->insert($data);
            
    
            // Check if the insert was successful
            $inserted = DB::table('free_trials')->where('email', $request->input('email'))->exists();
            if ($inserted) {
                return redirect()->route('trail-dashboard')->with('success', 'You have registered successfully in free trial Classes!');
            } else {
                return back()->withErrors(['error' => 'Failed to save data to the database']);
            }
        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('Failed to save data: ' . $e->getMessage());
    
            return back()->withErrors(['error' => 'Failed to save data: ' . $e->getMessage()]);
        }
    }
}
