<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class InstructivosController extends Controller
{
  public function index()
  {
    $products = Product::where('status', 1)
      ->where(function ($query) {
        $query->whereNotNull('instruction_file')
          ->orWhereNotNull('video');
      })
      ->get();

    //      dd($products);
    return view('instructivos', compact('products'));
  }
}
