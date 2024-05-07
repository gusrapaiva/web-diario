<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DiarioController;
use Illuminate\Support\Facades\Route;

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

    Route::get('/novo-diario', [DiarioController::class, 'createView'])->name('show-create');
    Route::post('/novo-diario', [DiarioController::class, 'addRegister'])->name('add-registro');
    Route::get('dashboard', [DiarioController::class, 'readAll'])->name('dashboard');
    
    Route::get('viewUpdate/{id}', [DiarioController::class, 'viewUpdate'])->name('show-update');
    Route::put('diario/{id}', [DiarioController::class, 'updateDiario'])->name('update-diario');

   Route::delete('dashboard/{id}', [DiarioController::class, 'destroy'])->name('delete-diario');
});

require __DIR__.'/auth.php';

Route::get('admin/dashboard', [AdminController::class, 'index'])->name('dashboard-admin');