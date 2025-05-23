<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Color;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class CategoryController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(): View
  {
    $productCategories = Category::all();
    return view('backend.product_categories.index', compact('productCategories'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(): View
  {
    $edit = false;
    $productCategories = Category::where('status', 1)
      ->whereDoesntHave(('parents'))
      ->get();
    $colors = Color::all();
    return view('backend.product_categories.create', compact('colors', 'productCategories', 'edit'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(CategoryRequest $request): RedirectResponse
  {
    // $request->validated();
    try {
      //    Guardar imágen de la categoria si se carga
      if ($request->hasFile('image')) {
        $original_name = $request->file('image')->getClientOriginalName();
        $id = Category::max('id') + 1;
        $image_name = $id . '_product_category_' . $original_name;
        $request->file('image')->storeAs('product_categories', $image_name);
      }
      // Guardar imágen del banner si se carga
      if ($request->hasFile('banner')) {
        $original_name = $request->file('banner')->getClientOriginalName();
        $id = Category::max('id') + 1;
        $banner_name = $id . '_product_category_banner_' . $original_name;
        $request->file('banner')->storeAs('product_categories', $banner_name);
      } else {
        $banner_name = '';
      }
      // Crear categoria
      $productCategory = Category::create([
        'name' => $request->input('name'),
        'color' => $request->input('color'),
        'slug' => $request->input('slug'),
        'feature' => $request->input('feature'),
        'image' => $image_name,
        'banner' => $banner_name,
        'status' => 1,
        'categoryParent_id' => $request->input('categoryParent_id'),
      ]);

      // Sincronizar las categorias padres
      if ($request->input('categories')) {
        $productCategory->parents()->sync($request->input('categories'));
      };

      toast('Se agregó una nueva categoría', 'success');
      return redirect()->route('admin.productCategory.index');
    } catch (\Throwable $th) {
      // dd($th);
      toast('No se pudo agregar la categoria');
      return redirect()->route('admin.productCategory.index');
    }
  }

  /**
   * Display the specified resource.
   */
  public function show(Category $productCategory)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Category $productCategory): View
  {
    // dd($productCategory->parents);
    $colors = Color::all();
    $productCategories = Category::where('status', 1)
      ->whereDoesntHave(('parents'))
      ->get();
    $edit = true;
    return view('backend.product_categories.edit', compact('productCategory', 'colors', 'productCategories', 'edit'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(CategoryRequest $request, Category $productCategory)
  {

    $request->validated();
    // dd($request->all());
    try {
      // Si se cambia la imágen eliminar la anterior y subir la nueva
      if ($request->hasFile('image')) {
        if (Storage::disk('public')->exists('product_categories/' . $productCategory->image)) {
          Storage::disk('public')->delete('product_categories/' . $productCategory->image);
        };
        $original_name = $request->file('image')->getClientOriginalName();
        $id = $productCategory->id;
        $image_name = $id . '_product_category_' . $original_name;
        $request->file('image')->storeAs('product_categories', $image_name);
      } else {
        $image_name = $productCategory->image;
      }
      // Si se cambia la imágen del banner eliminar la anterior y subir la nueva
      if ($request->hasFile('banner')) {
        if (Storage::disk('public')->exists('product_categories/' . $productCategory->banner)) {
          Storage::disk('public')->delete('product_categories/' . $productCategory->banner);
        };
        $original_name = $request->file('banner')->getClientOriginalName();
        $id = $productCategory->id;
        $banner_name = $id . '_product_category_banner_' . $original_name;
        $request->file('banner')->storeAs('product_categories', $banner_name);
      } else {
        $banner_name = $productCategory->banner;
      }
      // Actualizar los datos
      $productCategory->update([
        'name' => $request->input('name'),
        'color' => $request->input('color'),
        'slug' => $request->input('slug'),
        'feature' => $request->input('feature'),
        'image' => $image_name,
        'banner' => $banner_name,
        'categoryParent_id' => $request->input('categoryParent_id'),
      ]);

      // Sincronizar las categorias padres
      if ($request->input('categories')) {
        $productCategory->parents()->sync($request->input('categories'));
      };


      toast('La categoría se actualizo correctamente', 'success');
      return redirect()->route('admin.productCategory.index');
    } catch (\Throwable $th) {
      // dd($th);
      toast('No se pudo actualizar la categoría', 'error');
      return redirect()->route('admin.productCategory.index');
    }
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Category $productCategory)
  {
    //
  }
}
