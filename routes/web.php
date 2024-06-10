<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\DetailController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin');
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
    Route::delete('/agendas/{agenda}', [AgendaController::class, 'destroy'])->name('agendas.destroy');

    Route::prefix('agendas/{agenda}')->group(function () {
        Route::get('/details', [DetailController::class, 'index'])->name('details.index');
        Route::get('/userDetail', [DetailController::class, 'userDetail'])->name('details.userDetail');
        Route::get('/userDetail/create', [DetailController::class, 'create'])->name('details.create');
        Route::get('userDetail/createTransportasi', [DetailController::class, 'createTransportasi'])->name('details.createTransportasi');
        Route::get('userDetail/createDestinasi', [DetailController::class, 'createDestinasi'])->name('details.createDestinasi');
        Route::post('/userDetail', [DetailController::class, 'store'])->name('details.store');
        Route::get('/userDetail/{detail}', [DetailController::class, 'show'])->name('details.show');
        Route::get('/userDetail/{detail}/edit', [DetailController::class, 'edit'])->name('details.edit');
        Route::get('/userDetail/{detail}/editTransportasi', [DetailController::class, 'editTransportasi'])->name('details.editTransportasi');
        Route::get('/userDetail/{detail}/editDestinasi', [DetailController::class, 'editDestinasi'])->name('details.editDestinasi');
        Route::put('/userDetail/{detail}', [DetailController::class, 'update'])->name('details.update');
        Route::delete('/userDetail/{detail}', [DetailController::class, 'destroy'])->name('details.destroy');
    });
});

require __DIR__.'/auth.php';