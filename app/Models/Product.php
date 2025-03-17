<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
  use SoftDeletes;

  protected $table = 'products';
  protected $fillable = [
    'name',
    'slug',
    'description',
    'image_main',
    'image_1',
    'image_2',
    'image_3',
    'image_4',
    'image_5',
    'image_6',
    'productCategory_id',
    'video',
    'is_new',
    'information',
    'datasheet_file',
    'instruction_file',
    'instruction_button',
    'keywordsSEO',
    'descriptionSEO',
    'status'
  ];

  // Relación Colores
  public function colors(): BelongsToMany
  {
    return $this->belongsToMany(Color::class, 'color_products', 'product_id', 'color_id');
  }

  // Relación Categoria
  public function category(): BelongsTo
  {
    return $this->belongsTo(ProductCategory::class, 'productCategory_id');
  }

  // Relación otros productos
  public function relatedProducts(): BelongsToMany
  {
    return $this->belongsToMany(Product::class, 'product_products', 'product_id', 'relatedProduct_id');
  }

  // Buscar producto por slug
  public function getRouteKeyName(): string
  {
    return 'slug';
  }
}
