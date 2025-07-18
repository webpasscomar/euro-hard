<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductosController extends Controller
{


  public function index()
  {
    return view('productos');
  }


  public function categorias($categoriaSlug): View
  {
    $categoria = Category::where('slug', $categoriaSlug)
      ->where('status', 1)
      ->firstOrFail();

    $subcategorias = $categoria->children->sortBy('unit');
    return view('productos-categorias', compact('categoria', 'subcategorias'));
  }


  public function productos($categoria = null, $subcategoria = null): View
  {
    // Traemos todos los productos de la categoría correspondiente
    if ($categoria != 'categoria') {
      $productos = Product::where('status', 1)
        ->whereHas('categories', function ($query) use ($subcategoria) {
          $query->where('slug', $subcategoria);
        })
        ->orderBy('orderNumber', 'asc') // Orden ASC por orderNumber
        ->get();

      $categoria = Category::where('slug', $categoria)->firstOrFail();
      $subcategoria = Category::where('slug', $subcategoria)->firstOrFail();

      return view('productos', compact('categoria', 'subcategoria', 'productos'));
    } else {
      $subcategoria2 = Category::where('slug', $subcategoria)->firstOrFail();

      $productos = Product::where('status', 1)
        ->whereHas('categories', function ($query) use ($subcategoria) {
          $query->where('slug', $subcategoria);
        })
        ->orderBy('orderNumber', 'asc') // Orden ASC por orderNumber
        ->get();

      return view('productos', [
        'productos' => $productos,
        'subcategoria' => $subcategoria2
      ]);
    }
  }


  // Detalle del producto
  public function productoDetalle($categoriaSlug, $subcategoriaSlug, $productoSlug): View
  {
    $producto = Product::with('colors')
      ->where('slug', $productoSlug)
      ->where('status', 1)
      ->firstOrFail();

    $subcategoria = Category::where('slug', $subcategoriaSlug)->firstOrFail();

    return view('producto', [
      'producto' => $producto,
      'categoria' => $categoriaSlug,
      'subcategoria' => $subcategoria,
    ]);
  }


  public function productosHome(): View
  {
    $subcategorias = Category::where('status', 1)
      ->whereHas('parents')
      ->orderBy('unit')
      ->get();
    return view('productos-home', compact('subcategorias'));
  }


  public function buscarProductos(Request $request): View
  {
    // dd($request->input('buscar'));
    $query = $request->input('buscar');
    $productos = Product::where('status', 1)
      ->when($query, function ($q) use ($query) {
        $q->where('name', 'LIKE', "%$query%")
          ->orWhere('description', 'LIKE', "%$query%")
          ->orWhere('code', 'LIKE', "%$query%");
      })->get();
    return view('productos', compact('productos', 'query'));
  }
}
