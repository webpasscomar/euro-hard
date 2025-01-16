<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCategory extends Model
{
  use SoftDeletes;

  protected $table = 'product_categories';
  protected $fillable = [
    'name',
    'color',
    'image',
    'banner',
    'status',
    'categoryParent_id'
  ];

  public function parent(): BelongsTo
  {
    return $this->belongsTo(self::class, 'categoryParent_id');
  }

  public function childrens(): HasMany
  {
    return $this->hasMany(self::class, 'categoryParent_id');
  }
}
