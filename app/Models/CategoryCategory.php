<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryCategory extends Model
{
  protected $table = 'category_categories';
  protected $fillable = [
    'parent_id',
    'child_id'
  ];
}
