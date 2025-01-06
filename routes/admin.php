<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;



Route::redirect('/', '/admin/dashboard');

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
