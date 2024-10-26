<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('companies', CompanyController::class);
    Route::resource('employees', EmployeeController::class);
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

});

require __DIR__ . '/auth.php';
