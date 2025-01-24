<?php

use App\Http\Controllers\Backend\CatalogController;
use App\Http\Controllers\Backend\ColorController;
use App\Http\Controllers\Backend\CompanyController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Backend\NoveltyCategoriesController;
use App\Http\Controllers\Backend\NoveltyController;
use App\Http\Controllers\Backend\ProductCategoriesController;
use App\Http\Controllers\Backend\SubscriberController;
use App\Http\Controllers\Backend\UserController;

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

// Datos - Contactos

Route::resource('contactos', ContactController::class)
  ->parameter('contactos', 'contact')
  ->names('contacts');

// Empresa
Route::resource('empresa', CompanyController::class)
  ->parameter('empresa', 'company')
  ->names('company');

// Usuarios
Route::resource('usuarios', UserController::class)
  ->parameter('usuarios', 'user')
  ->names('users');

// Catalogos
Route::resource('catalogos', CatalogController::class)
  ->parameter('catalogos', 'catalog')
  ->names('catalogs');

// Novedades Categoría
Route::resource('novedades-categoria', NoveltyCategoriesController::class)
  ->parameter('novedades-categoria', 'noveltyCategory')
  ->names('noveltyCategory');


// Novedades
Route::resource('novedades', NoveltyController::class)
  ->parameter('novedades', 'novelty')
  ->names('novelties');

// Suscriptores
Route::resource('suscriptores', SubscriberController::class)
  ->parameter('suscriptores', 'subscriber')
  ->names('subscribers');
