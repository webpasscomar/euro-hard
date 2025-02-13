<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContactoRequest extends FormRequest
{

  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
   */
  public function rules(): array
  {
    $issues = ['Consulta', 'Presupuesto', 'Reclamo', 'Otros'];
    $companies = ['Distribuidor', 'Carpintero', 'Fabricante', 'Arquitecto', 'Consumidor final'];
    return [
      'name' => 'required|string|min:3|max:255',
      'lastName' => 'required|string|min:3|max:255',
      'issue' => ['required', Rule::in($issues)],
      'email' => 'required|email',
      'phone' => 'required|string|min:5|max:100|regex:/^\+?(\d{1,4})?[-.\s]?\(?\d{1,4}\)?[-.\s]?\d{1,4}[-.\s]?\d{1,9}$/',
      'company' => ['required', Rule::in($companies)],
      'message' => 'required|min:10|string',
      'g-recaptcha-response' => 'required|captcha',
    ];
  }
  public function messages(): array
  {
    return [
      'name.required' => 'Ingrese el nombre',
      'name.string' => 'Ingrese un nombre válido',
      'name.min' => 'Ingrese un mínimo de 3 caracteres',
      'name.max' => 'Máximo permitido 255 caracteres',
      'lastName.required' => 'Ingrese el apellido',
      'lastName.string' => 'Ingrese un nombre válido',
      'lastName.min' => 'Ingrese un mínimo de 3 caracteres',
      'lastName.max' => 'Máximo permitido 255 caracteres',
      'phone.required' => 'Ingrese un teléfono',
      'phone.string' => 'Ingrese un teléfono válido',
      'phone.min' => 'Ingrese un mínimo de 5 caracteres',
      'phone.max' => 'Máximo permitido 100 caracteres',
      'phone.regex' => 'Ingrese un número válido',
      'issue.required' => 'Seleccione un asunto',
      'issue.in' => 'Seleccione una opción válida',
      'email.required' => 'Ingrese un correo',
      'email.email' => 'Ingrese un email válido',
      'company.required' => 'Seleccione una empresa',
      'company.in' => 'Seleccione una opción válida',
      'message.required' => 'Escriba un mensaje',
      'message.string' => 'El mensaje no es válido',
      'message.min' => 'Escriba al menos 10 caracteres',
      'g-recaptcha-response.required' => 'Verifica que no eres un robot',
      'g-recaptcha-response.captcha' => 'Error en la validación del captcha',
    ];
  }
}
