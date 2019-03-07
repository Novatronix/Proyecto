<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Impuestos extends Model
{
    //
    protected $table="tipoimpuesto";
    protected $fillable = [
        'descripcion', 'porcentaje','estado'
    ];
}
