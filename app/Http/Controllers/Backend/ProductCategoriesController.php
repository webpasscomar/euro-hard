<?php

  namespace App\Http\Controllers\Backend;

  use App\Http\Controllers\Controller;
  use App\Http\Requests\ProductCategoryRequest;
  use App\Models\Color;
  use App\Models\ProductCategory;
  use Illuminate\Http\Request;
  use Illuminate\Support\Facades\Storage;
  use Illuminate\View\View;

  class ProductCategoriesController extends Controller
  {
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
      $productCategories = ProductCategory::all();
      return view('Backend.product_categories.index', compact('productCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
      $edit = false;
      $productCategories = ProductCategory::where('status', 1)->get();
      $colors = Color::all();
      return view('Backend.product_categories.create', compact('colors', 'productCategories', 'edit'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductCategoryRequest $request)
    {
      $request->validated();
      try {
        //    Guardar imágen de la categoria si se carga
        if ($request->hasFile('image')) {
          $original_name = $request->file('image')->getClientOriginalName();
          $id = ProductCategory::max('id') + 1;
          $image_name = $id . '_product_category_' . $original_name;
          $request->file('image')->storeAs('product_categories', $image_name);
        }
        // Guardar imágen del banner si se carga
        if ($request->hasFile('banner')) {
          $original_name = $request->file('banner')->getClientOriginalName();
          $id = ProductCategory::max('id') + 1;
          $banner_name = $id . '_product_category_banner_' . $original_name;
          $request->file('banner')->storeAs('product_categories', $banner_name);
        } else {
          $banner_name = '';
        }
        // Crear categoria
        ProductCategory::create([
          'name' => $request->input('name'),
          'color' => $request->input('color'),
          'image' => $image_name,
          'banner' => $banner_name,
          'status' => 1,
          'categoryParent_id' => $request->input('categoryParent_id'),
        ]);
        toast('Se agregó una nueva categoría', 'success');
        return redirect()->route('admin.productCategory.index');
      } catch (\Throwable $th) {
        dd($th);
        toast('No se pudo agregar la categoria');
        return redirect()->route('admin.productCategory.index');
      }
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductCategory $productCategory)
    {
      //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductCategory $productCategory): View
    {
      $colors = Color::all();
      $productCategories = ProductCategory::where('status', 1)->get();
      $edit = true;
      return view('Backend.product_categories.edit', compact('productCategory', 'colors', 'productCategories', 'edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductCategoryRequest $request, ProductCategory $productCategory)
    {
      $request->validated();

      try {
        // Si se cambia la imágen eliminar la anterior y subir la nueva
        if ($request->hasFile('image')) {
          if (Storage::disk('public')->exists('product_categories/' . $productCategory->image)) {
            Storage::disk('public')->delete('product_categories/' . $productCategory->image);
          };
          $original_name = $request->file('image')->getClientOriginalName();
          $id = ProductCategory::max('id') + 1;
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
          $id = ProductCategory::max('id') + 1;
          $banner_name = $id . '_product_category_banner_' . $original_name;
          $request->file('banner')->storeAs('product_categories', $banner_name);
        } else {
          $banner_name = $productCategory->banner;
        }
        // Actualizar los datos
        $productCategory->update([
          'name' => $request->input('name'),
          'color' => $request->input('color'),
          'image' => $image_name,
          'banner' => $banner_name,
          'categoryParent_id' => $request->input('categoryParent_id'),
        ]);
        toast('La categoría se actualizo correctamente', 'success');
        return redirect()->route('admin.productCategory.index');
      } catch (\Throwable $th) {
//        dd($th);
        toast('No se pudo actualizar la categoría', 'error');
        return redirect()->route('admin.productCategory.index');
      }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductCategory $productCategory)
    {
      //
    }
  }
