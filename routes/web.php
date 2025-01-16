<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\InstructivosController;
use App\Http\Controllers\NovedadesController;
use App\Http\Controllers\FormulariosController;
use App\Http\Controllers\ContactoController;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/empresa', [EmpresaController::class, 'index'])->name('empresa');
Route::get('/productos', [ProductosController::class, 'index'])->name('productos');
Route::get('/productos/categorias', [ProductosController::class, 'categorias'])->name('productos.categorias');
Route::get('/catalogo', [CatalogoController::class, 'index'])->name('catalogo');
Route::get('/instructivos', [InstructivosController::class, 'index'])->name('instructivos');
Route::get('/novedades', [NovedadesController::class, 'index'])->name('novedades');
Route::get('/formularios', [FormulariosController::class, 'index'])->name('formularios');
Route::get('/contacto', [ContactoController::class, 'index'])->name('contacto');
