<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Catalog;
use App\Models\Category;
use App\Models\Color;
use App\Models\Gallery;
use App\Models\Novelty;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
  public function index(): View
  {
    $contadores = [
      'products' => Product::count(),
      'colors' => Color::count(),
      'users' => User::count(),
      'novelties' => Novelty::count(),
      'categories' => Category::count(),
      'sliders' => Gallery::count(),
    ];

    return view('backend.dashboard', compact('contadores'));
  }
}
