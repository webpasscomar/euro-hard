<?php

  namespace App\Models;

  use Illuminate\Database\Eloquent\Model;
  use Illuminate\Database\Eloquent\SoftDeletes;

  class Gallery extends Model
  {
    use softDeletes;

    protected $table = 'galleries';
    protected $fillable = [
      'title',
      'status',
      'order',
      'image'
    ];
  }
