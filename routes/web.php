<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;
Route::get('/', function () {
    return view('welcome');
});
Route::resource('appointments', AppointmentController::class);
Route::get('/export', [AppointmentController::class, 'export'])->name('appointments.export');