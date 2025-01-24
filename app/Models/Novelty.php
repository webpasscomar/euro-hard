<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Novelty extends Model
{
  use SoftDeletes;

  protected $table = 'novelties';
  protected $fillable = [];
}
