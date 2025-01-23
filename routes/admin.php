<?php

  use App\Http\Controllers\Backend\ColorController;
  use App\Http\Controllers\Backend\ProductController;
  use Illuminate\Support\Facades\Route;
  use App\Http\Controllers\Backend\DashboardController;
  use App\Http\Controllers\Backend\GalleryController;
  use App\Http\Controllers\Backend\ProductCategoriesController;

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

// Productos Categoria
  Route::resource('productos-categoria', ProductCategoriesController::class)
    ->parameter('productos-categoria', 'productCategory')
    ->names('productCategory');

// Productos
  Route::resource('productos', ProductController::class)
    ->parameter('productos', 'product')
    ->names('products');
