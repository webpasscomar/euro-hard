<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Novelty extends Model
{
  use SoftDeletes;

  protected $table = 'novelties';
  protected $fillable = [
    'title',
    'description',
    'image',
    'status'
  ];


  protected function imagePath(): Attribute
  {
    return Attribute::get(
      fn() => ($this->image && Storage::disk('public')->exists('novelties/' . $this->image)) ? asset('storage/novelties/' . $this->image) : asset('img/no_disponible.jpg'),
    );
  }
}
