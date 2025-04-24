<?php

namespace App\Services;

use App\Models\Appointment;

class AppointmentService
{
    

    public function all()
    {
        return Appointment::orderBy('appointment_time', 'asc')->get();
    }


    public function create(array $data): Appointment
    {
        return Appointment::create($data);
    }

    public function find(int $id): Appointment
    {
        return Appointment::findOrFail($id);
    }


    public function update(int $id, array $data): bool
    {
        $appointment = $this->find($id);
        return $appointment->update($data);
    }

    public function delete(int $id): bool
    {
        $appointment = $this->find($id);
        return $appointment->delete();
    }
}
