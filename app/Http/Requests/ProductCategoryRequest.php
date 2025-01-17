<?php

namespace App\Http\Requests;

use App\Models\Color;
use App\Models\ProductCategory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductCategoryRequest extends FormRequest
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
    // dd($banner);
    return [
      'name' => [
        'required',
        'string',
        'min:3',
        'max:255',
        Rule::unique('product_categories', 'name')->ignore($put ? $id : null)
      ],
      'image' => $put ? 'image|mimes:jpeg,png,jpg,svg|max:1024' : 'required|image|mimes:jpeg,png,jpg,svg|max:1024',
      'color' => 'required|string',
      'banner' => $put && $categoryParent == null && !$banner ? 'required|image|mimes:jpeg,png,jpg,svg|max:1024' : ($categoryParent == null && !$banner ? 'required|image|mimes:jpeg,png,jpg,svg|max:1024' : 'image|mimes:jpeg,png,jpg,svg|max:1024'),
    ];
  }

  public function messages()
  {
    return [
      'name.required' => 'Ingrese un nombre',
      'name.string' => 'Ingrese un nombre válido',
      'name.min' => 'Ingrese un mínimo de 3 caracteres',
      'min.max' => 'La cantidad de caracteres no debe ser mayor a 255',
      'min.unique' => 'El nombre ya existe',
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
    ];
  }
}
