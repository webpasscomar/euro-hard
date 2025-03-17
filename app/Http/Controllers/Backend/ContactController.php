<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(): View
  {
    // Confirmar eliminación
    $title = 'Eliminar contacto?';
    $description = 'Esta acción no se podrá revertir';
    confirmDelete($title, $description);

    $contacts = Contact::all();
    return view('backend.contacts.index', compact('contacts'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(): View
  {
    return view('backend.contacts.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(ContactRequest $request): RedirectResponse
  {
    $request->validated();
    try {
      Contact::create([
        'address' => $request->input('address'),
        'phone' => $request->input('phone'),
        'email' => $request->input('email'),
        'facebook' => $request->input('facebook'),
        'instagram' => $request->input('instagram'),
        'youtube' => $request->input('youtube'),
        'whatsapp' => $request->input('whatsapp'),
        'status' => 1
      ]);

      toast('Contacto creado correctamente', 'success');
      return redirect()->route('admin.contacts.index');
    } catch (\Throwable $th) {
      //dd($th);
      toast('No se pudo crear el contacto', 'error');
      return redirect()->route('admin.contacts.index');
    }
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Contact $contact): View
  {
    return view('backend.contacts.edit', compact('contact'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(ContactRequest $request, Contact $contact): RedirectResponse
  {
    $request->validated();
    try {
      $contact->update([
        'address' => $request->input('address'),
        'phone' => $request->input('phone'),
        'email' => $request->input('email'),
        'facebook' => $request->input('facebook'),
        'instagram' => $request->input('instagram'),
        'youtube' => $request->input('youtube'),
        'whatsapp' => $request->input('whatsapp'),
      ]);

      toast('Contacto actualizado correctamente', 'success');
      return redirect()->route('admin.contacts.index');
    } catch (\Throwable $th) {
      dd($th);
      toast('No se pudo actualizar el contacto', 'error');
      return redirect()->route('admin.contacts.index');
    }
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Contact $contact): RedirectResponse
  {
    try {
      $contact->delete();
      toast('Contacto eliminado correctamente', 'success');
      return redirect()->route('admin.contacts.index');
    } catch (\Throwable $th) {
      //dd($th);
      toast('No se pudo eliminar el contacto', 'error');
      return redirect()->route('admin.contacts.index');
    }
  }
}
