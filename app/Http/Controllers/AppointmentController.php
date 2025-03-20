<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function index()
    {
        // Fetch only the appointments linked to the logged-in dentist
        $appointments = Appointment::where('user_id', Auth::id())->get();
        return view('appointments.index', compact('appointments'));
    }

    public function create()
    {
        return view('appointments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'address' => 'required|string',
            'number' => 'required|string',
            'appointment_date' => 'required|date',
            'type_of_action' => 'required|in:brace,teeth cleaning,root canal,pasta',
        ]);

        // Attach the appointment to the logged-in dentist
        Appointment::create([
            'user_id' => Auth::id(),
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'lastname' => $request->lastname,
            'address' => $request->address,
            'number' => $request->number,
            'appointment_date' => $request->appointment_date,
            'type_of_action' => $request->type_of_action,
        ]);

        return redirect()->route('appointments.index')->with('success', 'Appointment Created');
    }

    public function edit(Appointment $appointment)
    {
        // Ensure the logged-in user can only edit their own appointments
        if ($appointment->user_id !== Auth::id()) {
            return redirect()->route('appointments.index')->with('error', 'Unauthorized action.');
        }

        return view('appointments.edit', compact('appointment'));
    }

    public function update(Request $request, Appointment $appointment)
    {
        // Ensure the logged-in user can only update their own appointments
        if ($appointment->user_id !== Auth::id()) {
            return redirect()->route('appointments.index')->with('error', 'Unauthorized action.');
        }

        $request->validate([
            'appointment_date' => 'required|date',
            'type_of_action' => 'required|in:brace,teeth cleaning,root canal,pasta',
        ]);

        $appointment->update([
            'appointment_date' => $request->appointment_date,
            'type_of_action' => $request->type_of_action,
        ]);

        return redirect()->route('appointments.index')->with('success', 'Appointment Updated');
    }
}
