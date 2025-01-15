<?php

use App\Http\Controllers\Backend\ColorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\GalleryController;


Route::redirect('/', '/admin/dashboard');

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

//Galeria / Slide
Route::resource('galerias', GalleryController::class)
  ->parameter('galerias', 'gallery')
  ->names('galleries');

// Colores
Route::resource('colores', ColorController::class)
  ->parameter('colores', 'color')
  ->names('colors');
