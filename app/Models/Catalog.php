<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    protected $table = 'catalogs';
    
    protected $fillable = [
        'title',
        'pdf',
        'status',
    ];  
}
