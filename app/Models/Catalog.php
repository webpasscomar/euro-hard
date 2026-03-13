<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    protected $table = 'catalogs';
    
    protected $fillable = [
        'title',
        'slug',
        'pdf',
        'status',
        'image',
        'order',
    ];  

    public function getRouteKeyName()
    {
    return 'slug';
    }
}
