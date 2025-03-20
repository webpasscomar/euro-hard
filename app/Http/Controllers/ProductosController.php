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

    if ($categoria->childrens()->exists()) {
      $subcategorias = $categoria->childrens;
      return view('productos-categorias', compact('categoria', 'subcategorias'));
    } else {
      return $this->productos($categoria);
    }
  }

  public function productos($categoria, $subcategoria = null): View
  {
    // Traemos todos los productos de la categoria correspondiente
    if ($subcategoria != null) {
      $productos = Product::where('status', 1)
        ->whereHas('categories', function ($query) use ($subcategoria) {
          $query->where('slug', $subcategoria);
        })
        ->get();
      $categoria = Category::where('slug', $categoria)->firstOrFail();
      $subcategoria = Category::where('slug', $subcategoria)->firstOrFail();
      return view('productos', compact('categoria', 'subcategoria', 'productos'));
    } else {
      $productos = Product::where('status', 1)
        ->whereHas('category', function ($query) use ($categoria) {
          $query->where('slug', $categoria->slug);
        })
        ->get();
      return view('productos', compact('categoria', 'productos'));
    }
  }

  // Detalle del producto
  public function productoDetalle($categoriaSlug, $subcategoriaSlug, $productoSlug): View
  {
    $producto = Product::where('slug', $productoSlug)
      ->where('status', 1)
      ->firstOrFail();

    $subcategoria = Category::where('slug', $subcategoriaSlug)->firstOrFail();

    return view('producto', [
      'producto' => $producto,
      'categoria' => $categoriaSlug,
      'subcategoria' => $subcategoria,
    ]);
  }

  public function productosGeneral(): View
  {
    return view('productos-general');
  }
}
