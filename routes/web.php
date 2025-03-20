<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AppointmentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard Route (Appointments Overview)
Route::get('/dashboard', [AppointmentController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    // ✅ Added the missing "Appointments List" route
    Route::get('/appointments', [AppointmentController::class, 'index'])
        ->name('appointments.index');  

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Appointment Routes
    Route::get('/appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');
    Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');

    // Allow users to edit/update only their own appointments
    Route::get('/appointments/{appointment}/edit', [AppointmentController::class, 'edit'])
        ->middleware('auth')
        ->name('appointments.edit');

    Route::put('/appointments/{appointment}', [AppointmentController::class, 'update'])
        ->middleware('auth')
        ->name('appointments.update');
});

require __DIR__.'/auth.php';
