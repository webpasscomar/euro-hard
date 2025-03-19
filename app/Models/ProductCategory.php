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
    'slug',
    'feature',
    'color',
    'image',
    'banner',
    'status',
    'categoryParent_id'
  ];

  public function parent(): BelongsTo
  {
    return $this->belongsTo(ProductCategory::class, 'categoryParent_id');
  }

  public function childrens(): HasMany
  {
    return $this->hasMany(ProductCategory::class, 'categoryParent_id');
  }

  public function products(): HasMany
  {
    return $this->hasMany(Product::class, 'productCategory_id');
  }

  public function inactiveWithRelations(): void
  {
    $this->update(['status' => 0]);

    foreach ($this->childrens as $child) {
      $child->inactiveWithRelations();
    }

    foreach ($this->products as $product) {
      $product->update(['status' => 0]);
    }
  }

  public function activeWithRelations(): void
  {
    $this->update(['status' => 1]);

    foreach ($this->childrens as $child) {
      $child->activeWithRelations();
    }

    foreach ($this->products as $product) {
      $product->update(['status' => 1]);
    }
  }

  public function getRouteKeyName(): string
  {
    return 'slug';
  }
}
