<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\RedirectResponse;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProductController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(): View
  {
    // Modal para confirmar la eliminación del producto
    $title = 'Eliminar producto?';
    $text = "Está acción no se podrá revertir";
    confirmDelete($title, $text);

    $products = Product::all();
    return view('backend.products.index', compact('products'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(): View
  {
    $edit = false;
    $colors = Color::all();
    $products = Product::where('status', 1)->get();
    $productCategories = ProductCategory::where('status', 1)->get();
    return view('backend.products.create', compact('colors', 'products', 'productCategories', 'edit'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(ProductRequest $request): RedirectResponse
  {
    $request->validated();
    try {
      //      generar nombre de imágen principal y guardarla
      if ($request->hasFile('image_main')) {
        $name = $request->file('image_main')->getClientOriginalName();
        $image_main_name = Product::max('id') + 1 . '_product_' . $name;
        $request->file('image_main')->storeAs('products', $image_main_name);
      } else {
        $image_main_name = null;
      };
      //      Chequear si se envian las 6 imágenes complementarias, generar su nombre y guardarlas
      //      Imágen 1
      if ($request->hasFile('image_1')) {
        $name1 = $request->file('image_1')->getClientOriginalName();
        $image_1 = Product::max('id') + 1 . '_product_gallery1_' . $name1;
        $request->file('image_1')->storeAs('products', $image_1);
      } else {
        $image_1 = null;
      };
      //      Imágen 2
      if ($request->hasFile('image_2')) {
        $name2 = $request->file('image_2')->getClientOriginalName();
        $image_2 = Product::max('id') + 1 . '_product_gallery2_' . $name2;
        $request->file('image_2')->storeAs('products', $image_2);
      } else {
        $image_2 = null;
      };
      //      Imágen 3
      if ($request->hasFile('image_3')) {
        $name3 = $request->file('image_3')->getClientOriginalName();
        $image_3 = Product::max('id') + 1 . '_product_gallery3_' . $name3;
        $request->file('image_3')->storeAs('products', $image_3);
      } else {
        $image_3 = null;
      };
      //      Imágen 4
      if ($request->hasFile('image_4')) {
        $name4 = $request->file('image_4')->getClientOriginalName();
        $image_4 = Product::max('id') + 1 . '_product_gallery4_' . $name4;
        $request->file('image_4')->storeAs('products', $image_4);
      } else {
        $image_4 = null;
      };
      //      Imágen 5
      if ($request->hasFile('image_5')) {
        $name5 = $request->file('image_5')->getClientOriginalName();
        $image_5 = Product::max('id') + 1 . '_product_gallery5_' . $name5;
        $request->file('image_5')->storeAs('products', $image_5);
      } else {
        $image_5 = null;
      };
      //      Imágen 6
      if ($request->hasFile('image_6')) {
        $name6 = $request->file('image_6')->getClientOriginalName();
        $image_6 = Product::max('id') + 1 . '_product_gallery6_' . $name6;
        $request->file('image_6')->storeAs('products', $image_6);
      } else {
        $image_6 = null;
      };

      // Archivos PDF - Datasheet e Instructions
      // Datasheet
      if ($request->hasFile('datasheet_file')) {
        $file_name = $request->file('datasheet_file')->getClientOriginalName();
        $datasheet_file_name = Product::max('id') + 1 . '_product_datasheet_' . $file_name;
        $request->file('datasheet_file')->storeAs('products', $datasheet_file_name);
      } else {
        $datasheet_file_name = null;
      }
      // Instructions
      if ($request->hasFile('instruction_file')) {
        $file_name = $request->file('instruction_file')->getClientOriginalName();
        $instructions_file_name = Product::max('id') + 1 . '_product_instructions_' . $file_name;
        $request->file('instruction_file')->storeAs('products', $instructions_file_name);
      } else {
        $instructions_file_name = null;
      }

      $product = Product::create([
        'name' => $request->input('name'),
        'slug' => $request->input('slug'),
        'description' => $request->input('description'),
        'image_main' => $image_main_name,
        'image_1' => $image_1,
        'image_2' => $image_2,
        'image_3' => $image_3,
        'image_4' => $image_4,
        'image_5' => $image_5,
        'image_6' => $image_6,
        'productCategory_id' => $request->input('productCategory_id'),
        'information' => $request->input('information'),
        'video' => $request->input('video'),
        'is_new' => (bool)$request->input('is_new'),
        'datasheet_file' => $datasheet_file_name,
        'instruction_file' => $instructions_file_name,
        'instruction_button' => (bool)$request->input('instruction_button'),
        'keywordsSEO' => $request->input('keywordsSEO'),
        'descriptionSEO' => $request->input('descriptionSEO'),
        'status' => 1
      ]);

      // Si se agregan colores sincronizar la relacion con colores
      if ($request->input('colors')) {
        $product->colors()->sync($request->input('colors'));
      }

      // Si se asocian productos sincronizar la relación con los productos relacionados
      if ($request->input('products')) {
        $product->relatedProducts()->sync($request->input('products'));
      }

      toast('Producto creado con éxito', 'success');
      return redirect()->route('admin.products.index');
    } catch (\Throwable $th) {
      dd($th);
      toast('No se pudo crear el producto', 'error');
      return redirect()->route('admin.products.index');
    };
  }


  public function edit(Product $product): View
  {
    $colors = Color::all();
    $productCategories = ProductCategory::where('status', 1)->get();
    $products = Product::where('status', 1)
      ->where('id', '!=', $product->id)
      ->get();

    return view('backend.products.edit', [
      'edit' => true,
      'product' => $product,
      'colors' => $colors,
      'productCategories' => $productCategories,
      'products' => $products
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(ProductRequest $request, Product $product): RedirectResponse
  {
    $request->validated();

    try {
      // generar nombre de imágen principal y guardarla
      if ($request->hasFile('image_main')) {

        // Eliminar la imágen anterior si se encuentra en el storage
        if (Storage::disk('public')->exists('products/' . $product->image_main)) {
          Storage::disk('public')->delete('products/' . $product->image_main);
        };
        // Guardar la nueva imágen con el nombre generado
        $name = $request->file('image_main')->getClientOriginalName();
        $image_main_name = $product->id . '_product_' . $name;
        $request->file('image_main')->storeAs('products', $image_main_name);
      } else {
        $image_main_name = $product->image_main;
      };
      // Chequear si se envian las 6 imágenes complementarias, generar su nombre y guardarlas
      // Imágen 1
      if ($request->hasFile('image_1')) {
        // Eliminar la imágen anterior si se encuentra en el storage
        if (Storage::disk('public')->exists('products/' . $product->image_1)) {
          Storage::disk('public')->delete('products/' . $product->image_1);
        };
        // Guardar la nueva imágen con el nombre generado
        $name1 = $request->file('image_1')->getClientOriginalName();
        $image_1 = $product->id . '_product_gallery1_' . $name1;
        $request->file('image_1')->storeAs('products', $image_1);
      } else {
        $image_1 = $product->image_1;
      };
      // Imágen 2
      if ($request->hasFile('image_2')) {
        // Eliminar la imágen anterior si se encuentra en el storage
        if (Storage::disk('public')->exists('products/' . $product->image_2)) {
          Storage::disk('public')->delete('products/' . $product->image_2);
        };
        // Guardar la nueva imágen con el nombre generado
        $name2 = $request->file('image_2')->getClientOriginalName();
        $image_2 = $product->id . '_product_gallery2_' . $name2;
        $request->file('image_2')->storeAs('products', $image_2);
      } else {
        $image_2 = $product->image_2;
      };
      // Imágen 3
      if ($request->hasFile('image_3')) {
        // Eliminar la imágen anterior si se encuentra en el storage
        if (Storage::disk('public')->exists('products/' . $product->image_3)) {
          Storage::disk('public')->delete('products/' . $product->image_3);
        };
        // Guardar la nueva imágen con el nombre generado
        $name3 = $request->file('image_3')->getClientOriginalName();
        $image_3 = $product->id . '_product_gallery3_' . $name3;
        $request->file('image_3')->storeAs('products', $image_3);
      } else {
        $image_3 = $product->image_3;
      };
      // Imágen 4
      if ($request->hasFile('image_4')) {
        // Eliminar la imágen anterior si se encuentra en el storage
        if (Storage::disk('public')->exists('products/' . $product->image_4)) {
          Storage::disk('public')->delete('products/' . $product->image_4);
        };
        // Guardar la nueva imágen con el nombre generado
        $name4 = $request->file('image_4')->getClientOriginalName();
        $image_4 = $product->id . '_product_gallery4_' . $name4;
        $request->file('image_4')->storeAs('products', $image_4);
      } else {
        $image_4 = $product->image_4;
      };
      // Imágen 5
      if ($request->hasFile('image_5')) {
        // Eliminar la imágen anterior si se encuentra en el storage
        if (Storage::disk('public')->exists('products/' . $product->image_5)) {
          Storage::disk('public')->delete('products/' . $product->image_5);
        };
        // Guardar la nueva imágen con el nombre generado
        $name5 = $request->file('image_5')->getClientOriginalName();
        $image_5 = $product->id . '_product_gallery5_' . $name5;
        $request->file('image_5')->storeAs('products', $image_5);
      } else {
        $image_5 = $product->image_5;
      };
      // Imágen 6
      if ($request->hasFile('image_6')) {
        // Eliminar la imágen anterior si se encuentra en el storage
        if (Storage::disk('public')->exists('products/' . $product->image_6)) {
          Storage::disk('public')->delete('products/' . $product->image_6);
        };
        // Guardar la nueva imágen con el nombre generado
        $name6 = $request->file('image_6')->getClientOriginalName();
        $image_6 = $product->id . '_product_gallery6_' . $name6;
        $request->file('image_6')->storeAs('products', $image_6);
      } else {
        $image_6 = $product->image_6;
      };

      // Archivos PDF - Datasheet e Instructions
      // Datasheet
      if ($request->hasFile('datasheet_file')) {
        // Eliminar el archivo anterior si se encuentra en el storage
        if (Storage::disk('public')->exists('products/' . $product->datasheet_file)) {
          Storage::disk('public')->delete('products/' . $product->datasheet_file);
        };
        // Guardar el nuevo arvhivo
        $file_name = $request->file('datasheet_file')->getClientOriginalName();
        $datasheet_file_name = $product->id . '_product_datasheet_' . $file_name;
        $request->file('datasheet_file')->storeAs('products', $datasheet_file_name);
      } else {
        $datasheet_file_name = $product->datasheet_file;
      }
      // Instructions
      if ($request->hasFile('instruction_file')) {
        // Eliminar el archivo anterior si se encuentra en el storage
        if (Storage::disk('public')->exists('products/' . $product->instruction_file)) {
          Storage::disk('public')->delete('products/' . $product->instruction_file);
        };
        // Guardar el nuevo arvhivo
        $file_name = $request->file('instruction_file')->getClientOriginalName();
        $instructions_file_name = $product->id . '_product_instructions_' . $file_name;
        $request->file('instruction_file')->storeAs('products', $instructions_file_name);
      } else {
        $instructions_file_name = $product->instruction_file;
      }

      // Actualizar producto
      $product->update([
        'name' => $request->input('name'),
        'slug' => $request->input('slug'),
        'description' => $request->input('description'),
        'image_main' => $image_main_name,
        'image_1' => $image_1,
        'image_2' => $image_2,
        'image_3' => $image_3,
        'image_4' => $image_4,
        'image_5' => $image_5,
        'image_6' => $image_6,
        'productCategory_id' => $request->input('productCategory_id'),
        'information' => $request->input('information'),
        'video' => $request->input('video'),
        'is_new' => (bool)$request->input('is_new'),
        'datasheet_file' => $datasheet_file_name,
        'instruction_file' => $instructions_file_name,
        'instruction_button' => (bool)$request->input('instruction_button'),
        'keywordsSEO' => $request->input('keywordsSEO'),
        'descriptionSEO' => $request->input('descriptionSEO'),
        'status' => $product->status,
      ]);


      // Si se agregan colores sincronizar la relacion con colores
      if ($request->input('colors')) {
        $product->colors()->sync($request->input('colors'));
      }

      // Si se asocian productos sincronizar la relación con los productos relacionados
      if ($request->input('products')) {
        $product->relatedProducts()->sync($request->input('products'));
      }

      toast('Producto actualizado con éxito', 'success');
      return redirect()->route('admin.products.index');
    } catch (\Throwable $th) {
      dd($th);
      toast('No se pudo actualizar el producto', 'error');
      return redirect()->route('admin.products.index');
    };
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Product $product): RedirectResponse
  {
    // Comprobar si la imágen principal y las que se encuentren en el storage estén y eliminarlas al eliminar el producto
    if (Storage::disk('public')->exists('products/' . $product->image_main)) {
      Storage::disk('public')->delete('products/' . $product->image_main);
    };
    if (Storage::disk('public')->exists('products/' . $product->image_1)) {
      Storage::disk('public')->delete('products/' . $product->image_1);
    };
    if (Storage::disk('public')->exists('products/' . $product->image_2)) {
      Storage::disk('public')->delete('products/' . $product->image_2);
    };
    if (Storage::disk('public')->exists('products/' . $product->image_3)) {
      Storage::disk('public')->delete('products/' . $product->image_3);
    };
    if (Storage::disk('public')->exists('products/' . $product->image_4)) {
      Storage::disk('public')->delete('products/' . $product->image_4);
    };
    if (Storage::disk('public')->exists('products/' . $product->image_5)) {
      Storage::disk('public')->delete('products/' . $product->image_5);
    };
    if (Storage::disk('public')->exists('products/' . $product->image_6)) {
      Storage::disk('public')->delete('products/' . $product->image_6);
    };
    // Comprobar si los archivos PDF se encuentran en el storage y eliminarlos al eliminar el producto
    if (Storage::disk('public')->exists('products/' . $product->datasheet_file)) {
      Storage::disk('public')->delete('products/' . $product->datasheet_file);
    };
    if (Storage::disk('public')->exists('products/' . $product->instruction_file)) {
      Storage::disk('public')->delete('products/' . $product->instruction_file);
    };

    // Eliminar el producto
    try {
      $product->delete();
      toast('Producto eliminado con éxito', 'success');
      return redirect()->route('admin.products.index');
    } catch (\Throwable $th) {
      // dd($th);
      toast('No se pudo eliminar el producto', 'error');
      return redirect()->route('admin.products.index');
    }
  }
}
