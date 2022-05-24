<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function(){
    Route::get('/',[PageController::class, 'dashboard'])->name('dashboard');
});


