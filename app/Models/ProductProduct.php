<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductProduct extends Model
{
  protected $table = 'product_products';
  protected $fillable = [
    'product_id',
    'relatedProduct_id'
  ];
}
