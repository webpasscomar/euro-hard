<?php

  namespace App\Http\Controllers\Backend;

  use App\Http\Controllers\Controller;
  use App\Http\Requests\ProductCategoryRequest;
  use App\Models\Color;
  use App\Models\ProductCategory;
  use Illuminate\Http\Request;
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
          $banner_name = $id . '_product_category_' . $original_name;
          $request->file('banner')->storeAs('product_categories', $banner_name);
        }

        ProductCategory::created([
          'name' => $request->input('name'),
          'color' => $request->input('color'),
          'image' => $image_name,
          'banner' => $banner_name,
        ]);

      } catch (\Throwable $th) {
//        dd($th);

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
    public function edit(ProductCategory $productCategory)
    {
      //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductCategory $productCategory)
    {
      //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductCategory $productCategory)
    {
      //
    }
  }
