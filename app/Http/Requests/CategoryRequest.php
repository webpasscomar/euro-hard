<?php

namespace App\Http\Requests;

use App\Models\Color;
use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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
    $id = $this->route('productCategory')['id'] ?? null;
    $categoryParent = $this->request->get('categoryParent_id');
    $currentCategory = $this->route('productCategory')['banner'] ?? null;
    $banner = (bool)$currentCategory;

    return [
      'name' => [
        'required',
        'string',
        'min:3',
        'max:255',
        Rule::unique('categories', 'name')->ignore($put ? $id : null)
      ],
      'slug' => [
        'required',
        'string',
        'min:3',
        'max:100',
        'regex:/^[a-z0-9-]+$/',
        Rule::unique('categories', 'slug')->ignore($put ? $id : null)
      ],
      'feature' => 'nullable',
      'image' => $put ? 'image|mimes:jpeg,png,jpg,svg|max:1024' : 'required|image|mimes:jpeg,png,jpg,svg|max:1024',
      'color' => [
        'required',
        'string',
        Rule::exists('colors', 'color')
      ],
      'categoryParent_id' => [
        'nullable',
        'integer',
        function ($attribute, $value, $fail) use ($id) {
          if ($value == $id) {
            $fail('La categoría padre no puede ser igual a la actual');
          }
        }
      ],
      'banner' => $put ? 'image|mimes:jpeg,png,jpg,svg|max:1024' : 'required|image|mimes:jpeg,png,jpg,svg|max:1024',
    ];
  }

  public function messages()
  {
    return [
      'name.required' => 'Ingrese un nombre',
      'name.string' => 'Ingrese un nombre válido',
      'name.min' => 'Ingrese un mínimo de 3 caracteres',
      'name.max' => 'La cantidad de caracteres no debe ser mayor a 255',
      'name.unique' => 'El nombre ya existe',
      'slug.required' => 'Ingrese un slug',
      'slug.string' => 'Ingrese un slug válido',
      'slug.regex' => 'Ingrese un slug válido',
      'slug.min' => 'Ingrese un mínimo de 3 caracteres',
      'slug.unique' => 'El slug ya existe',
      'slug.max' => 'La cantidad de caracteres no debe ser mayor a 100',
      'image.required' => 'Ingrese una imágen',
      'image.image' => 'Ingrese una imágen válida',
      'image.mimes' => 'Ingrese una imágen válida',
      'image.max' => 'La imágen no debe ser mayor a 1Mb',
      'banner.required' => 'Ingrese una imágen',
      'banner.image' => 'Ingrese una imágen válida',
      'banner.mimes' => 'Ingrese una imágen válida',
      'banner.max' => 'La imágen no debe ser mayor a 1Mb',
      'color.string' => 'Ingrese un color válido',
      'color.required' => 'Ingrese un color',
      'color.exists' => 'El color no existe',
    ];
  }
}
