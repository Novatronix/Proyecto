<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    //
    protected $table ="cliente";
    public $timestamps = false;
    protected $fillable = [
        'nombre_cliente', 'identificacion','dias_credito','tipo_pago'
        ];
}
