<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Category;
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
    $sliders = Gallery::where('status', 1)
      ->orderBy('order', 'asc')
      ->get();
    // $categoriasPadre = ProductCategory::get();
    $categoriasPadre = Category::whereNull('categoryParent_id')
      ->where('status', 1)
      ->get();

    return view('home', compact('sliders', 'categoriasPadre'));
  }
}
