<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\NoveltyRequest;
use App\Models\Novelty;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class NoveltyController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(): View
  {
    // Confirmar la eliminación de un item
    $title = 'Eliminar novedad?';
    $description = 'Está acción no se podrá revertir';
    confirmDelete($title, $description);

    $novelties = Novelty::all();
    return view('backend.novelties.index', compact('novelties'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(): View
  {
    $edit = false;
    return view('backend.novelties.create', compact('edit'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(NoveltyRequest $request): RedirectResponse
  {
    $request->validated();

    try {
      // Comprobar si hay imágen
      if ($request->hasFile('image')) {
        // crear el nombre de la imágen
        $id = Novelty::max('id') + 1;
        $originalName = $request->file('image')->getClientOriginalName();
        $image_name = $id . '_novelty_' . $originalName;
        // Guardar la imágen en Storage
        $request->file('image')->storeAs('novelties', $image_name);
      }
      // Guardar en la base de datos
      Novelty::create([
        'title' => $request->input('title'),
        'description' => $request->input('description'),
        'image' => $image_name,
        'status' => 1
      ]);

      toast('Se agregó una novedad', 'success');
      return redirect(route('admin.novelties.index'));
    } catch (\Throwable $th) {
      // dd($th);
      toast('No se pudo agregar la novedad', 'error');
      return redirect(route('admin.novelties.index'));
    }
  }

  public function edit(Novelty $novelty): View
  {
    $edit = true;
    return view('backend.novelties.edit', compact('novelty', 'edit'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(NoveltyRequest $request, Novelty $novelty): RedirectResponse
  {
    $request->validated();

    try {
      // Si se cambia la imagen, borramos la anterior si existe y guardamos la nueva con el nuevo nombre
      if ($request->hasFile('image')) {
        if (Storage::disk('public')->exists('novelties/' . $novelty->image)) {
          Storage::disk('public')->delete('novelties/' . $novelty->image);
        }
        // crear el nombre de la imágen
        $id = $novelty->id;
        $originalName = $request->file('image')->getClientOriginalName();
        $image_name = $id . '_novelty_' . $originalName;
        // Guardar la imágen en Storage
        $request->file('image')->storeAs('novelties', $image_name);
      } else {
        // Si no se cambia la imágen mantenemos el nombre que tenia
        $image_name = $novelty->image;
      }

      $novelty->update([
        'title' => $request->input('title'),
        'description' => $request->input('description'),
        'image' => $image_name,
      ]);
      toast('La novedad se actualizó con éxito', 'success');
      return redirect(route('admin.novelties.index'));
    } catch (\Throwable $th) {
      // dd($th);
      toast('No se pudo actualizar la novedad', 'error');
      return redirect(route('admin.novelties.index'));
    }
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Novelty $novelty): RedirectResponse
  {
    // Eliminar el registro imágen borrando su respectiva imágen
    try {
      if (Storage::disk('public')->exists('novelties/' . $novelty->image)) {
        Storage::disk('public')->delete('novelties/' . $novelty->image);
      }
      $novelty->delete();
      toast('La novedad se eliminó correctamente', 'success');
      return redirect(route('admin.novelties.index'));
    } catch (\Throwable $th) {
      // dd($th);
      toast('No se pudo eliminar la novedad', 'error');
      return redirect(route('admin.novelties.index'));
    }
  }
}
