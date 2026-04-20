<?php

use App\Http\Controllers\EmployeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [EmployeController::class, 'index']);


Route::resource('employes', EmployeController::class);

Route::post('import', [EmployeController::class, 'import'])->name('employes.import');

Route::get('/export', [EmployeController::class, 'export'])->name('employes.export');