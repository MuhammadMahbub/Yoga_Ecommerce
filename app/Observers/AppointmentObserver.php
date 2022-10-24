<?php

namespace App\Observers;

use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;

class AppointmentObserver
{
    public function creating(Appointment $appointment)
    {
        $appointment->created_by = Auth::user()->id;
    }


    public function updating(Appointment $appointment)
    {
        $appointment->updated_by = Auth::user()->id;
    }
}
