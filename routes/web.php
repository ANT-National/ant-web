<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrationEventController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/event/register', [RegistrationEventController::class, 'showRegistrationForm'])->name('showRegistrationForm');
Route::post('/event/register', [RegistrationEventController::class, 'handleEventRegister'])->name('handleEventRegister');

require __DIR__.'/auth.php';
