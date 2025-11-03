<?php

namespace App\Http\Controllers;

use App\Mail\FormDistributorReceive;
use App\Mail\FormProductSend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Anhskohbo\NoCaptcha\Facades\NoCaptcha;
use App\Mail\FormDistributorSend;
use App\Mail\FormExperienceReceive;
use App\Mail\FormExperienceSend;
use App\Mail\FormProductReceive;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class FormulariosController extends Controller
{
  public function index(): View
  {
    return view('formularios');
  }

  public function experiencia(): View
  {
    return view('formulario-experiencia');
  }

  public function distribuidores(): View
  {
    // Leer y convertir en un array los datos de productos comerciales que estan en storage/app/assets/json
    $ruta_json = storage_path('app/assets/json/productos_comerciales.json');
    $productos_comerciales = json_decode(file_get_contents($ruta_json));

    $provincias = DB::table('provinces')->get();
    return view('formulario-distribuidores', compact('provincias', 'productos_comerciales'));
  }

  public function productos(): View
  {
    $provincias = DB::table('provinces')->get();
    return view('formulario-productos', compact('provincias'));
  }

  // Formulario de experiencia
  public function enviar_formulario_experiencia(Request $request): RedirectResponse
  {
    $data = $request->validate([
      'fullName' => 'required',
      'email' => 'required',
      'phone' => 'required',
      'client' => 'required',
      'g-recaptcha-response' => 'required|captcha'
    ], [
      'fullName.required' => 'Ingrese el nombre',
      'email.required' => 'Ingrese el correo',
      'phone.required' => 'Ingrese el teléfono',
      'client.required' => 'Seleccione una opción',
      'g-recaptcha.required' => 'Error. Captcha inválido',
      'g-recaptcha.captcha' => 'Error. Captcha inválido',
    ]);

    $response = NoCaptcha::verifyResponse($request->input('g-recaptcha-response'));

    if ($response) {
      // Enviar correo al usuario - Formulario Experiencia
      Mail::to($data['email'])->send(new FormExperienceSend($data['fullName']));
      Mail::to(config('mail.form.experience'))->send(new FormExperienceReceive($data));

      toast('EL formulario se envió correctamente', 'success');
      return redirect()->route('formularios.experiencia');
    } else {
      toast('No se pudo enviar el formulario', 'error');
      return redirect()->route('formularios.experiencia');
    }
  }

  // Formulario de distribuidores
  public function enviar_formulario_distribuidores(Request $request): RedirectResponse
  {
    $data = $request->validate([
      'fullName' => 'required',
      'phone' => 'required',
      'email' => 'required',
      'client' => 'required',
      'province' => 'required',
      'products' => 'required|array',
      'inconvenient' => 'required',
      'inconvenient_description' => $request->input('inconvenient') == 'si' ? 'required' : 'nullable',
      'g-recaptcha-response' => 'required|captcha'
    ], [
      'fullName.required' => 'Ingrese el nombre',
      'phone.required' => 'Ingrese el teléfono',
      'email.required' => 'Ingrese el correo',
      'client.required' => 'Seleccione una opción',
      'province.required' => 'Seleccione una provincia',
      'products.required' => 'Seleccione uno ó más productos',
      'inconvenient.required' => 'Seleccione una opción',
      'inconvenient_description.required' => 'Escriba una descripción del problema',
      'g-recaptcha.required' => 'Error. Captcha inválido',
      'g-recaptcha.captcha' => 'Error. Captcha inválido',
    ]);

    $response = NoCaptcha::verifyResponse($request->input('g-recaptcha-response'));

    if ($response) {
      // Correo enviado al contacto
      Mail::to($data['email'])->send(new FormDistributorSend($data['fullName']));
      // Correo que con los datos del contacto
      Mail::to(config('mail.form.distributors'))->send(new FormDistributorReceive($data));
      toast('EL formulario se envió correctamente', 'success');
      return redirect()->route('formularios.distribuidores');
    } else {
      toast('No se pudo enviar el formulario', 'error');
      return redirect()->route('formularios.distribuidores');
    }
  }

  public function enviar_formulario_productos(Request $request): RedirectResponse
  {
    $request->validate([
      'fullName' => 'required',
      'phone' => 'required',
      'email' => 'required',
      'province' => 'required',
      'user' => 'required',
      'client' => 'required',
      'cod_product' => 'required',
      'name_product' => 'required',
      'consultation' => 'required',
      'image' => 'nullable|image|mimes:jpg,png,jpeg|max:1024',
      'g-recaptcha-response' => 'required|captcha',
    ], [
      'fullName.required' => 'Ingrese el nombre',
      'phone.required' => 'Ingrese el teléfono',
      'email.required' => 'Ingrese el correo',
      'province.required' => 'Seleccione una provincia',
      'user.required' => 'Ingrese el usuario',
      'client.required' => 'Seleccione una opción',
      'cod_product.required' => 'Ingrese el código del producto',
      'name_product.required' => 'Ingrese el nombre del producto',
      'consultation.required' => 'Ingrese la consulta',
      'image.image' => 'Ingrese una imágen válida (jpg, jpeg, png)',
      'image.mimes' => 'Ingrese una imágen válida (jpg, jpeg, png)',
      'image.max' => 'Peso máximo permitido: 1mb',
    ]);

    $response = NoCaptcha::verifyResponse($request->input('g-recaptcha-response'));

    if ($response) {
      // Se envia mail al cliente
      Mail::to($request->input('email'))->send(new FormProductSend($request->input('fullName')));
      // Se reciben los datos del formulario en el correo correspondiente

      // Si envian la imágen adjunta se guarda temporalmente en storage tmp , luego al enviar el email se elimina
      Mail::to(config('mail.form.products'))->send(new FormProductReceive($request->all()));
      toast('EL formulario se envió correctamente', 'success');
      return redirect()->route('formularios.productos');
    } else {
      toast('No se pudo enviar el formulario', 'error');
      return redirect()->route('formularios.productos');
    }
  }
}
