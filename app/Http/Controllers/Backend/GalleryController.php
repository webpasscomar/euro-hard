<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\GalleryRequest;
use App\Models\Gallery;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class GalleryController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(): View
  {
    // Confirmar la eliminación de un item
    $title = 'Eliminar slide?';
    $text = "Está acción no se podrá revertir";
    confirmDelete($title, $text);

    $slides = Gallery::all();
    return view('backend.galleries.index', compact('slides'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(): View
  {
    return View('backend.galleries.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(GalleryRequest $request): RedirectResponse
  {
    $request->validated();

    try {
      // Comprobar si hay imágen
      if ($request->hasFile('image')) {
        // crear el nombre de la imágen
        $id = Gallery::max('id') + 1;
        $originalName = $request->file('image')->getClientOriginalName();
        $image_name = $id . '_gallery_' . $originalName;
        // Guardar la imágen en Storage
        $request->file('image')->storeAs('galleries', $image_name);
      }

      Gallery::create([
        'title' => $request->input('title'),
        'order' => $request->input('order'),
        'image' => $image_name,
        'status' => 1
      ]);

      toast('Se agregó una nueva imágen', 'success');
      return redirect(route('admin.galleries.index'));
    } catch (\Throwable $th) {
      // dd($th);
      toast('No se pudo agregar una nueva imágen', 'error');
      return redirect(route('admin.galleries.index'));
    }
  }

  /**
   * Display the specified resource.
   */
  public function show(Gallery $gallery)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Gallery $gallery): View
  {
    return view('Backend.galleries.edit', compact('gallery'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(GalleryRequest $request, Gallery $gallery): RedirectResponse
  {
    $request->validated();

    try {
      // Si se cambia la imagen, borramos la anterior si existe y guardamos la nueva con el nuevo nombre
      if ($request->hasFile('image')) {
        if (Storage::disk('public')->exists('galleries/' . $gallery->image)) {
          Storage::disk('public')->delete('galleries/' . $gallery->image);
        }
        // crear el nombre de la imágen
        $id = $gallery->id;
        $originalName = $request->file('image')->getClientOriginalName();
        $image_name = $id . '_gallery_' . $originalName;
        // Guardar la imágen en Storage
        $request->file('image')->storeAs('galleries', $image_name);
      } else {
        // Si no se cambia la imágen mantenemos el nombre que tenia
        $image_name = $gallery->image;
      }

      $gallery->update([
        'title' => $request->input('title'),
        'order' => $request->input('order'),
        'image' => $image_name,
      ]);
      toast('La imágen se actualizó con éxito', 'success');
      return redirect(route('admin.galleries.index'));
    } catch (\Throwable $th) {
      // dd($th);
      toast('No se pudo actualizar la imágen', 'error');
      return redirect(route('admin.galleries.index'));
    }
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Gallery $gallery): RedirectResponse
  {
    // Eliminar el registro imágen borrando su respectiva imágen
    try {
      if (Storage::disk('public')->exists('galleries/' . $gallery->image)) {
        Storage::disk('public')->delete('galleries/' . $gallery->image);
      }
      $gallery->delete();
      toast('La imágen se eliminó correctamente', 'success');
      return redirect(route('admin.galleries.index'));
    } catch (\Throwable $th) {
      dd($th);
      toast('No se pudo eliminar la imágen', 'error');
      return redirect(route('admin.galleries.index'));
    }
  }
}
