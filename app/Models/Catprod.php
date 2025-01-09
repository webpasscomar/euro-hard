<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'catprod'; 

    protected $fillable = [
        'nombre',
        'color',
        'imagen',
        'banner',
        'estado',
        'categoriapadre_id',
    ]; 
}
