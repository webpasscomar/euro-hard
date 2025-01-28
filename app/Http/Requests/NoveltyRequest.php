<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NoveltyRequest extends FormRequest
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
    $put = $this->isMethod('put');
    $id = $this->route('novelty')['id'] ?? null;


    return [
      'title' => [
        'required',
        'string',
        'min:3',
        'max:255',
        Rule::unique('novelties', 'title')->ignore($id),
      ],
      'description' => 'required|string|min:5',
      'image' => $put ? 'image|mimes:jpeg,png,jpg,svg|max:1024' : 'required|image|mimes:jpeg,png,jpg,svg|max:1024',
    ];
  }

  public function messages()
  {
    return [
      'title.required' => 'Ingrese un título',
      'title.string' => 'Ingrese un título válido',
      'title.min' => 'El título debe tener al menos 3 caracteres',
      'title.max' => 'El título debe un máximo de 255 caracteres',
      'title.unique' => 'Ya existe una novedad con este título',
      'description.required' => 'Ingrese una descripción',
      'description.string' => 'Ingrese una descripción válida',
      'description.min' => 'La descripción debe tener al menos 5 caracteres',
      'image.required' => 'Ingrese una imágen',
      'image.image' => 'Ingrese una imágen válida',
      'image.mimes' => 'Ingrese una extensión permitida (jpeg, png, jpg, svg)',
      'image.max' => 'La imágen no debe pesar más de 1MB'
    ];
  }
}
