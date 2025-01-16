<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GalleryRequest extends FormRequest
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
    $put = $this->isMethod('PUT');

    $id = $this->route('gallery')['id'] ?? null;

    return [
      'title' => 'required|max:255|min:3|string',
      'order' => [
        'required',
        'integer',
        'min:1',
        Rule::unique('galleries', 'order')->ignore($put ? $id : null),
      ],
      'image' => $put ? 'image|mimes:jpeg,png,jpg,svg|max:1024' : 'required|image|mimes:jpeg,png,jpg,svg|max:1024',
    ];
  }

  public function messages()
  {
    return [
      'title.required' => 'Ingrese un título',
      'title.string' => 'Ingrese un titulo válido',
      'title.min' => 'Ingrese un mínimo de 3 caracteres',
      'title.max' => 'Máximo de 255 caracteres',
      'order.required' => 'Ingrese número de orden',
      'order.integer' => 'Ingrese un dato válido',
      'order.min' => 'El número de orden mínimo es 1',
      'order.unique' => 'El número es repetido',
      'image.required' => 'La imágen es requerida',
      'image.image' => 'Seleccione una imágen permitida',
      'image.mimes' => 'Seleccione una imágen permitida',
      'image.max' => 'El tamaño máximo es de 1mb'
    ];
  }
}
