<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class InstructivosController extends Controller
{
  public function index()
  {
    $conInstructivo = function ($query) {
      $query->where('status', 1)
        ->where(function ($q) {
          $q->whereNotNull('instruction_file')
            ->orWhereNotNull('video');
        });
    };

    $parentCategories = Category::where('status', 1)
      ->doesntHave('parents')
      ->where(function ($query) use ($conInstructivo) {
        $query->whereHas('products', $conInstructivo)
          ->orWhereHas('children', function ($q) use ($conInstructivo) {
            $q->where('status', 1)->whereHas('products', $conInstructivo);
          });
      })
      ->with([
        'products' => function ($query) use ($conInstructivo) {
          $conInstructivo($query);
          $query->orderBy('orderNumber');
        },
        'children' => function ($query) use ($conInstructivo) {
          $query->where('status', 1)
            ->whereHas('products', $conInstructivo)
            ->with(['products' => function ($q) use ($conInstructivo) {
              $conInstructivo($q);
              $q->orderBy('orderNumber');
            }])
            ->orderBy('unit');
        },
      ])
      ->orderBy('unit')
      ->get();

    return view('instructivos', compact('parentCategories'));
  }
}
