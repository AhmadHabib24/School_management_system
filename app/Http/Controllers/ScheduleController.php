<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeacherEvent;

class ScheduleController extends Controller
{
    //


    public function index()
    {
        $event = TeacherEvent::all();

        return view('admin.teacher-Schedule',compact('event'));
    }

    public function store_event(Request $request)
    {

        // Validate the incoming request data
        $validated = $request->validate([
            'event_name' => 'required|string|max:255',
            'event_color' => 'required|string|max:50',
        ]);


        // Save the event in the database
        TeacherEvent::create([
            'teacher_id' => auth()->id(), // Assuming the logged-in teacher's ID
            'event_name' => $validated['event_name'],
            'event_color' => $validated['event_color'],
        ]);

        // Return a success response
        return redirect()->back()->with('success', 'Event created successfully!');
    }
   
}
