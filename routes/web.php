<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homepage');
})->name('home');

Route::get('/about', [CompanyController::class, 'about']);

Route::get('/contact', [CompanyController::class, 'contact']);

Route::get('/vehicle/{vehicle}', [VehicleController::class, 'detail'])->name('detail');

Route::get('/search', [VehicleController::class, 'search']);

Route::middleware(['ensure.auth'])->group(function () {
    Route::post('/add-lead/{vehicle}', [LeadController::class, 'store'])
        ->name('leads.store');
});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

require __DIR__.'/auth.php';
