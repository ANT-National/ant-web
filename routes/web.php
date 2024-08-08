<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrationEventController;
use App\Models\Event;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');

Route::get('/dashboard', function () {
    $events = Event::all();
    return view('dashboard',['events'=>$events]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/events/{id}', [EvenementController::class, 'show'])->name('events.show');
Route::post('/participe/{id}/{user}', [EvenementController::class, 'participe'])->name('events.participate');
Route::get('/admin/scan', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
Route::post('/admin/scan-qrcode', [AdminDashboardController::class, 'scan'])->name('admin.scan');


Route::get('/event/register', [RegistrationEventController::class, 'showRegistrationForm'])->name('showRegistrationForm');
Route::post('/event/register', [RegistrationEventController::class, 'handleEventRegister'])->name('handleEventRegister');
Route::get('/participe/{id}/{user}', [EvenementController::class, 'participe'])->name('participe');

require __DIR__.'/auth.php';
