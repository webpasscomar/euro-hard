<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ColorRequest;
use App\Models\Color;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ColorController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(): View
  {

    $title = 'Eliminar color?';
    $text = "Está acción no se podrá revertir";
    confirmDelete($title, $text);

    $colors = Color::all();
    return view('Backend.colors.index', compact('colors'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(): View
  {
    return view('Backend.colors.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(ColorRequest $request): RedirectResponse
  {
    $request->validated();

    try {
      Color::create([
        'color' => $request->input('color'),
      ]);
      toast('Se agregó un nuevo color', 'success');
      return redirect(route('admin.colors.index'));
    } catch (\Throwable $th) {
      // dd($th);
      toast('No se pudo agregar un nuevo color', 'error');
      return redirect(route('admin.colors.index'));
    }
  }

  /**
   * Display the specified resource.
   */
  public function show(Color $color)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Color $color)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Color $color)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Color $color): RedirectResponse
  {
    try {
      $color->delete();
      toast('El color se eliminó correctamente', 'success');
      return redirect(route('admin.colors.index'));
    } catch (\Throwable $th) {
      // dd($th);
      toast('No se pudo eliminar el color', 'error');
      return redirect(route('admin.colors.index'));
    }
  }
}
