<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sliders = Gallery::get();
        // $categoriasPadre = ProductCategory::get();
        $categoriasPadre = ProductCategory::whereNull('categoryParent_id')
        ->where('status', 1)
        ->get();

        return view('home', compact('sliders', 'categoriasPadre'));
    }
}
