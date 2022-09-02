<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Appointment $request)
    {
        $selectedDate = Request::input('appointmentDate');
        $appointments = Appointment::where('appointment_day', $selectedDate)
            ->orderBy('appointment_start_time')
            ->get()->map->only(['appointment_start_time', 'appointment_end_time']);

        return response($appointments, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreAppointmentRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAppointmentRequest $request)
    {

        $appointment = new Appointment();

        $appointment->user_id = Auth::id();
        $appointment->first_name = $request->firstName;
        $appointment->second_name = $request->secondName;
        $appointment->age = $request->age;
        $appointment->appointment_day = $request->appointmentDate;
        $appointment->appointment_start_time = $request->appointmentStartTime;
        $appointment->appointment_end_time = $request->appointmentEndTime;

        $appointment->save();

        return redirect('dashboard')->with('appointment', 'Te-ai programat cu succes!');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Appointment $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Appointment $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateAppointmentRequest $request
     * @param \App\Models\Appointment $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAppointmentRequest $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Appointment $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}
