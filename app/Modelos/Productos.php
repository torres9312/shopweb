<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 
        'precio', 
        'medida',
        'cantidad',
        'imagen',
        'descripcion',
        'marca',
        'estatus'
    ];
}
