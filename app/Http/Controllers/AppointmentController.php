<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppointmentRequest;
use Illuminate\Http\Request;
use App\Services\AppointmentService;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AppointmentsExport;

class AppointmentController extends Controller
{
    protected $service;

    public function __construct(AppointmentService $service)
    {
        $this->service = $service;
    }

    /**
     * عرض جميع المواعيد
     */
    public function index()
    {
        $appointments = $this->service->all();
        return view('appointments.index', compact('appointments'));
    }

    /**
     * عرض نموذج إضافة موعد جديد
     */
    public function create()
    {
        return view('appointments.create');
    }

    /**
     * تخزين موعد جديد
     */
    public function store(AppointmentRequest $request)
    {
    

        $this->service->create($request->all());

        return redirect()->route('appointments.index')->with('success', 'تم إضافة الموعد بنجاح');
    }

    /**
     * عرض نموذج تعديل موعد
     */
    public function edit($id)
    {
        $appointment = $this->service->find($id);
        return view('appointments.edit', compact('appointment'));
    }

    /**
     * تحديث بيانات الموعد
     */
    public function update(AppointmentRequest $request, $id)
    {
   

        $this->service->update($id, $request->all());

        return redirect()->route('appointments.index')->with('success', 'تم تعديل الموعد بنجاح');
    }

    /**
     * حذف الموعد
     */
    public function destroy($id)
    {
        $this->service->delete($id);
        return redirect()->route('appointments.index')->with('success', 'تم حذف الموعد بنجاح');
    }

    /**
     * الدالة show غير مستخدمة حاليًا
     */
    public function show($id)
    {
        //
    }

    public function export()
    {
        return Excel::download(new AppointmentsExport, 'appointments'.now()->format('Y-m-d-H-i-s').'.xlsx');
    }
}
