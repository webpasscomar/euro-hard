<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Catalog;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CatalogController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(): View
  {
    $catalogs = Catalog::orderBy('order')->get();

    return view('backend.catalogs.index', compact('catalogs'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $catalog = new Catalog();
    return view('backend.catalogs.create', compact('catalog'));
  }

  public function store(Request $request)
  {
    // 1️⃣ Validación de todos los campos obligatorios
    $validated = $request->validate([
      'title' => 'required|string|max:255',
      'slug' => 'nullable|string|unique:catalogs,slug', // puede generarse automáticamente
      'status' => 'required|boolean',
      'order' => 'required|integer',
      'pdf' => 'required|file|mimes:pdf|max:20240',      // obligatorio y tipo PDF
      'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:5120', // obligatorio
    ]);

    // 2️⃣ Crear instancia del catálogo
    $catalog = new Catalog();
    $catalog->title = $validated['title'];

    // 3️⃣ Generar slug automáticamente si no viene
    $catalog->slug = $validated['slug'] ?? Str::slug($validated['title']);

    $catalog->order = $validated['order'];
    $catalog->status = $validated['status'];

    // 4️⃣ Guardar PDF con nombre del slug
    if ($request->hasFile('pdf')) {
      $pdfFile = $request->file('pdf');
      $pdfName = $catalog->slug . '.' . $pdfFile->getClientOriginalExtension();
      $catalog->pdf = $pdfFile->storeAs('/catalogs/pdfs', $pdfName, 'public');
    }

    // 5️⃣ Guardar imagen normalmente
    if ($request->hasFile('image')) {
      // ===== Guardar Imagen con el mismo nombre =====
      $imageFile = $request->file('image');
      $imageName = $catalog->slug . '.' . $imageFile->getClientOriginalExtension();
      $catalog->image = $imageFile->storeAs('/catalogs/images', $imageName, 'public');
    }

    // 6️⃣ Guardar en la base de datos
    $catalog->save();

    // 7️⃣ Redirigir con mensaje de éxito
    toast('Se agregó un nuevo catálogo', 'success');
    return redirect()->route('admin.catalogs.index');
  }
  /**
   * Display the specified resource.
   */
  public function show(Catalog $catalog)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Catalog $catalog): View
  {
    return view('backend.catalogs.edit', compact('catalog'));
  }


  public function update(Request $request, Catalog $catalog)
  {
    // 1️⃣ Validación
    $validated = $request->validate([
      'title' => 'required|string|max:255',
      'slug' => 'nullable|string|unique:catalogs,slug,' . $catalog->id,
      'status' => 'required|boolean',
      'order' => 'required|integer',
      'pdf' => 'nullable|file|mimes:pdf|max:20240',         // opcional en edición
      'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:5120', // opcional
    ]);

    // 2️⃣ Actualizar datos
    $catalog->title = $validated['title'];
    $catalog->slug = $validated['slug'] ?? Str::slug($validated['title']);
    $catalog->order = $validated['order'];
    $catalog->status = $validated['status'];

    // 3️⃣ Reemplazar PDF si suben uno nuevo
   if ($request->hasFile('pdf')) {
      $pdfFile = $request->file('pdf');
      $pdfName = $catalog->slug . '.' . $pdfFile->getClientOriginalExtension();
      $catalog->pdf = $pdfFile->storeAs('/catalogs/pdfs', $pdfName, 'public');
    }

    // 5️⃣ Guardar imagen normalmente
    if ($request->hasFile('image')) {
      // ===== Guardar Imagen con el mismo nombre =====
      $imageFile = $request->file('image');
      $imageName = $catalog->slug . '.' . $imageFile->getClientOriginalExtension();
      $catalog->image = $imageFile->storeAs('/catalogs/images', $imageName, 'public');
    }

    // 5️⃣ Guardar cambios
    $catalog->save();

    // 6️⃣ Redirigir con toast
    toast('Catálogo actualizado correctamente', 'success');
    return redirect()->route('admin.catalogs.index');
  }
  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Catalog $catalog)
  {
    //
  }
}
