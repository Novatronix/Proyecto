<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clientes;
class webservice extends Controller
{
    //
    public static function getClientes(){
      $datos=Clientes::all();
      return \Response::json(["clientes"=>$datos,"estado"=>1]);
    }
    public function getInventario($bodega){
       $datos=\DB::table('productos')->join('tipoimpuesto','productos.impuesto_id','=','tipoimpuesto.id')->
                  select('productos.id as codigo','productos.descripcion','productos.precio','tipoimpuesto.porcentaje as porcentaje')->
                  selectraw('0 as existencia')->get();
        return \Response::json(["inventario"=>$datos,"estado"=>1]);

    }
}
