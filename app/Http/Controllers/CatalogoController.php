<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CatalogoController extends Controller
{
    // Lista todos los catálogos activos
    public function index(): View
    {
        $catalogs = Catalog::where('status', 1)->get();
        return view('catalogos', compact('catalogs'));
    }

    // Muestra un catálogo específico
    public function show($id): View
    {
        $catalog = Catalog::findOrFail($id);
        return view('catalogo', compact('catalog'));
    }
}
