<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\DetailController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('agendas', AgendaController::class);
    Route::get('/user/agendas', [AgendaController::class, 'userAgendas'])->name('user.agendas');
    
    Route::prefix('agendas/{agenda}')->group(function () {
        Route::get('/details', [DetailController::class, 'index'])->name('details.index');
        Route::get('/details/create', [DetailController::class, 'create'])->name('details.create');
        Route::post('/details', [DetailController::class, 'store'])->name('details.store');
        Route::get('/details/{detail}', [DetailController::class, 'show'])->name('details.show');
        Route::get('/details/{detail}/edit', [DetailController::class, 'edit'])->name('details.edit');
        Route::put('/details/{detail}', [DetailController::class, 'update'])->name('details.update');
        Route::delete('/details/{detail}', [DetailController::class, 'destroy'])->name('details.destroy');
    });
});

require __DIR__.'/auth.php';
