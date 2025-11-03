<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CatalogoController extends Controller
{
    public function index(): View
    {
        $catalog = Catalog::first();
        return view('catalogo', compact('catalog'));
    }
}
