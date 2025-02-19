<?php

  namespace App\Http\Controllers;

  use App\Models\Product;
  use Illuminate\Http\Request;

  class InstructivosController extends Controller
  {
    public function index()
    {
      $products = Product::where('instruction_file', '!=', null)
        ->where('status', 1)
        ->get();

//      dd($products);
      return view('instructivos', compact('products'));
    }
  }
