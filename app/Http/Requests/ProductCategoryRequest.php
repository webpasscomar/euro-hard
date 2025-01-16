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
    return [
      'name' => [
        'required',
        'string',
        'min:3',
        'max:255',
        Rule::unique('product_categories', 'name')->ignore($put ? $id : null)
      ],
      'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:1024',
      'banner' =>  $categoryParent ? 'nullable|image|mimes:png,jpg,jpg,svg|max:1024' : 'required|image|mimes:png,jpg,jpg,svg|max:1024',
      'color' => 'required|string',
    ];
  }
  public function messages()
  {
    return [
      'name.required' => 'Ingrese un nombre',
    ];
  }
}
