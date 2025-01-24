<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NoveltyCategory extends Model
{
  use SoftDeletes;

  protected $table = 'novelty_categories';
  protected $fillable = [];
}
