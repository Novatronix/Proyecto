<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    //
    protected $table="Productos";
    protected $fillable = [
        'descripcion', 'precio','impuesto_id','estado'
    ];
}
