<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function(){
    Route::get('/',[PageController::class, 'dashboard'])->name('dashboard');

    Route::resource('employee', EmployeeController::class);

    Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');

    Route::resource('department', DepartmentController::class);

    Route::resource('role', RoleController::class);
});


