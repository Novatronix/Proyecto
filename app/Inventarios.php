<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventarios extends Model
{
  //
  protected $table="productos";
  protected $fillable = [
    'descripcion',
    'impuesto_id',
    'precio',
    'estado'
  ];
}
