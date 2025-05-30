<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DoctorController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/create-user/{name}/{email}', [UserController::class, 'createUser']);
    Route::get('/read-users', [UserController::class, 'readUsers']);

    # crud for users
    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    Route::resource('patients', PatientController::class);
    Route::resource('doctors', DoctorController::class);
    Route::get('/patients/{id}', [PatientController::class, 'show'])->name('patients.show');
});
