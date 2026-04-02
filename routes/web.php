<?php

use App\Http\Controllers\Admin\FootballDataController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('admin.football-data.index');
    }

    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return redirect()->route('admin.football-data.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('admin/football-data', FootballDataController::class)
        ->names('admin.football-data')
        ->parameters(['football-data' => 'footballData']);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
