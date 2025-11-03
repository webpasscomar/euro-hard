<?php

namespace App\Http\Controllers;

use Anhskohbo\NoCaptcha\Facades\NoCaptcha;
use App\Http\Requests\Frontend\ContactoRequest;
use App\Mail\ContactRecieveEmail;
use App\Mail\ContactSendEmail;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactoController extends Controller
{
  public function index()
  {
    $contact = Contact::first();
    return view('contacto', compact('contact'));
  }

  public function store(ContactoRequest $request): RedirectResponse
  {
    $contact = $request->validated();

    $response = NoCaptcha::verifyResponse($request->input('g-recaptcha-response'));

    if ($response) {
      Mail::send(new ContactSendEmail($request->input('email'), $request->input('name'), $request->input('lastName')));
      Mail::send(new ContactRecieveEmail($contact));
      toast('Los datos se envíaron correctamente', 'success');
      return redirect()->route('contacto');
    } else {
      toast('No se pudo enviar los datos', 'error');
      return redirect()->route('contacto');
    }
  }
}
