<?php

  namespace App\Http\Controllers;

  use App\Models\Product;
  use App\Models\ProductCategory;
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
      $categoria = ProductCategory::where('slug', $categoriaSlug)
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
          ->whereHas('category', function ($query) use ($subcategoria) {
            $query->where('slug', $subcategoria);
          })
          ->get();
        $categoria = ProductCategory::where('slug', $categoria)->firstOrFail();
        $subcategoria = ProductCategory::where('slug', $subcategoria)->firstOrFail();
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

    public function productosGeneral(): View
    {
      return view('productos-general');
    }
  }
