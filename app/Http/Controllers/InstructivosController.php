<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class InstructivosController extends Controller
{
  public function index()
  {
    $categories = Category::whereHas('products', function ($query) {
      $query->where('status', 1)
        ->where(function ($q) {
          $q->whereNotNull('instruction_file')
            ->orWhereNotNull('video');
        });
    })
      ->with(['products' => function ($query) {
        $query->where('status', 1)
          ->where(function ($q) {
            $q->whereNotNull('instruction_file')
              ->orWhereNotNull('video');
          })
          ->orderBy('orderNumber');
      }])
      ->orderBy('unit')
      ->get();

    return view('instructivos', compact('categories'));
  }
}
