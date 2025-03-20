<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
    $id = request()->route('product')->id ?? null;
    $product = $id ? Product::findOrFail($id) : null;

    $put = request()->isMethod('put');


    return [
      'name' => $put ? 'required|string|min:3|max:255|unique:products,name,' . $id : 'required|string|min:3|max:255|unique:products,name',
      'slug' => [
        'required',
        'string',
        'min:3',
        'max:100',
        'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/',
        $put ? Rule::unique('products', 'slug')->ignore($id) : Rule::unique('products', 'slug'),
      ],
      'description' => 'required|min:10|string',
      'image_main' =>  $put ? 'image|mimes:png,jpg,jpeg,svg|max:1024' : 'required|image|mimes:png,jpg,jpeg,svg|max:1024',
      'categories' => 'required|array',
      'categories.*' => 'exists:categories,id',
      'video' => 'nullable|url',
      'image_1' => 'nullable|image|mimes:png,jpg,jpeg,svg|max:1024',
      'image_2' => $put ? (!request()->hasFile('image_1') && $product->image_1 == null ? 'prohibited' : 'nullable|image|mimes:png,jpg,jpeg,svg|max:1024') : (request()->hasFile('image_1') ? 'nullable|image|mimes:png,jpg,jpeg,svg|max:1024' : 'prohibited'),
      'image_3' => $put ? (!request()->hasFile('image_2') && $product->image_2 == null ? 'prohibited' : 'nullable|image|mimes:png,jpg,jpeg,svg|max:1024') : (request()->hasFile('image_2') ? 'nullable|image|mimes:png,jpg,jpeg,svg|max:1024' : 'prohibited'),
      'image_4' => $put ? (!request()->hasFile('image_3') && $product->image_3 == null ? 'prohibited' : 'nullable|image|mimes:png,jpg,jpeg,svg|max:1024') : (request()->hasFile('image_3') ? 'nullable|image|mimes:png,jpg,jpeg,svg|max:1024' : 'prohibited'),
      'image_5' => $put ? (!request()->hasFile('image_4') && $product->image_4 == null ? 'prohibited' : 'nullable|image|mimes:png,jpg,jpeg,svg|max:1024') : (request()->hasFile('image_4') ? 'nullable|image|mimes:png,jpg,jpeg,svg|max:1024' : 'prohibited'),
      'image_6' => $put ? (!request()->hasFile('image_5') && $product->image_5 == null ? 'prohibited' : 'nullable|image|mimes:png,jpg,jpeg,svg|max:1024') : (request()->hasFile('image_5') ? 'nullable|image|mimes:png,jpg,jpeg,svg|max:1024' : 'prohibited'),
      'datasheet_file' => 'mimes:pdf|max:2048',
      'instruction_file' => 'mimes:pdf|max:2048',
      'keywordsSEO' => 'max:255',
      'descriptionSEO' => 'max:255'
    ];
  }

  public function messages()
  {
    return [
      'name.required' => 'Ingrese un nombre',
      'name.string' => 'Ingrese un nombre válido',
      'name.min' => 'Ingrese un mínimo de 3 caracteres',
      'name.max' => 'Máximo 255 caracteres',
      'name.unique' => 'Ya existe un producto con ese nombre',
      'slug.required' => 'Ingrese un slug',
      'slug.string' => 'Ingrese un slug válido',
      'slug.min' => 'Ingrese un mínimo de 3 caracteres',
      'slug.max' => 'Máximo 100 caracteres',
      'slug.unique' => 'Ya existe un producto con ese slug',
      'slug.regex' => 'Ingrese un slug válido',
      'description.required' => 'Ingrese una descripción',
      'description.string' => 'Ingrese una descripción válida',
      'description.min' => 'Ingrese un mínimo de 10 caracteres',
      'image_main.required' => 'La imágen es requerida',
      'image_main.image' => 'Formato no permitido',
      'image_main.mimes' => 'Formato no permitido',
      'image_main.max' => 'Tamaño no permitido. Máximo 1mb',
      'categories.required' => 'Seleccione al menos una categoría',
      'categories.array' => 'Seleccione una categoria válida',
      'categories.*.exists' => 'Seleccione una categoria válida',
      'video.url' => 'Ingrese una URL válida',
      'image_1.image' => 'Formato no permitido',
      'image_1.mimes' => 'Formato no permitido',
      'image_1.max' => 'Tamaño no permitido. Máximo 1mb',
      'image_2.image' => 'Formato no permitido',
      'image_2.mimes' => 'Formato no permitido',
      'image_2.max' => 'Tamaño no permitido. Máximo 1mb',
      'image_2.prohibited' => 'Debe subir las imágenes en orden: 1,2,...',
      'image_3.image' => 'Formato no permitido',
      'image_3.mimes' => 'Formato no permitido',
      'image_3.max' => 'Tamaño no permitido. Máximo 1mb',
      'image_3.prohibited' => 'Debe subir las imágenes en orden: 1,2,...',
      'image_4.image' => 'Formato no permitido',
      'image_4.mimes' => 'Formato no permitido',
      'image_4.max' => 'Tamaño no permitido. Máximo 1mb',
      'image_4.prohibited' => 'Debe subir las imágenes en orden: 1,2,...',
      'image_5.image' => 'Formato no permitido',
      'image_5.mimes' => 'Formato no permido',
      'image_5.max' => 'Tamaño no permitido. Máximo 1mb',
      'image_5.prohibited' => 'Debe subir las imágenes en orden: 1,2,...',
      'image_6.image' => 'Formato no permitido',
      'image_6.mimes' => 'Formato no permitido',
      'image_6.max' => 'Tamaño no permitido. Máximo 1mb',
      'image_6.prohibited' => 'Debe subir las imágenes en orden: 1,2,...',
      'datasheet_file.mimes' => 'Format no permitido. Solo PDF',
      'datasheet_file.max' => 'Tamaño no permitido. Máximo 2mb',
      'instruction_file.mimes' => 'Format no permitido. Solo PDF',
      'instruction_file.max' => 'Tamaño no permitido. Máximo 2mb',
      'keywordSEO.max' => 'Máximo permitido 255 caracteres',
      'descriptionSEO.max' => 'Máximo permitido 255 caracteres',
    ];
  }
}
