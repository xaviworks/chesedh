<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Appointment;

class AppointmentPolicy
{
    /**
     * Determine if the user can update the appointment.
     */
    public function update(User $user, Appointment $appointment): bool
    {
        return $user->id === $appointment->user_id; // ✅ Only allow appointment owner
    }
}
