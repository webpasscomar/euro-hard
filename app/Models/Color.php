<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Color extends Model
{
  use SoftDeletes;

  protected $table = 'colors';
  protected $fillable = [
    'color',
    'name',
    'feature'
  ];

  public function products(): BelongsToMany
  {
    return $this->belongsToMany(Product::class, 'color_products', 'color_id', 'product_id');
  }
}
