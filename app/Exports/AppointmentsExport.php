<?php

namespace App\Exports;

use App\Models\Appointment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AppointmentsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Appointment::orderBy('appointment_time', 'asc')
            ->select('title', 'description', 'appointment_time')
            ->get();
    }

    public function headings(): array
    {
        return ['العنوان', 'الوصف', 'وقت الموعد'];
    }
}
