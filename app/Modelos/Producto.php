<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table ="productos";
    protected $primaryKey = "id";
    
    public $timestamps = false;
    
    protected $fillable = [
        'nombre', 
        'precio', 
        'unidad_medida',
        'medida',
        'imagen',
        'descripcion',
        'marca',
        'estatus',
        'stock'
    ];
}
