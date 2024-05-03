<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiarioController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/create-diario', [DiarioController::class, 'createView'])->name('show-create');
    Route::post('/create-diario', [DiarioController::class, 'addRegister'])->name('add-registro');
    Route::get('dashboard', [DiarioController::class, 'readAll'])->name('dashboard');


});

require __DIR__.'/auth.php';

Route::get('admin/dashboard', [HomeController::class, 'index'])->name('dashboard-admin');