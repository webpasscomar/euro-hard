<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
  use SoftDeletes;

  protected $table = 'categories';
  protected $fillable = [
    'name',
    'slug',
    'feature',
    'color',
    'image',
    'banner',
    'status',
  ];

  // Relación entre categorias padres e hijas de muchos a muchos
  public function parents(): BelongsToMany
  {
    return $this->belongsToMany(Category::class, 'category_categories', 'child_id', 'parent_id');
  }

  public function children(): BelongsToMany
  {
    return $this->belongsToMany(Category::class, 'category_categories', 'parent_id', 'child_id');
  }

  // Relación productos - muchos a muchos
  public function products(): BelongsToMany
  {
    return $this->belongsToMany(Product::class, 'category_products', 'category_id', 'product_id');
  }

  public function inactiveWithRelations(): void
  {
    $this->update(['status' => 0]);

    foreach ($this->children as $child) {
      $child->inactiveWithRelations();
    }

    foreach ($this->products as $product) {
      $product->update(['status' => 0]);
    }
  }

  public function activeWithRelations(): void
  {
    $this->update(['status' => 1]);

    foreach ($this->children as $child) {
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
