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
        $catalogos = Catalog::where('status', 1)->get();
        return view('catalogos', compact('catalogos'));
    }

    // Muestra un catálogo específico
    public function show($slug): View
    {
        $catalog = Catalog::where('slug', $slug)->firstOrFail();
        return view('catalogo', compact('catalog'));
    }
}
