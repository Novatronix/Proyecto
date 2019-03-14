<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Impuestos;
use App\Inventarios;
use App\Productos;
use App\Clientes;

class Inventario extends Controller
{
    //// IMPUESTO
    public static function impuestosindex(){
        if (!\Auth::check()){
            return redirect('/login');
        }
        $impuesto=Impuestos::all();
        return \View::make('inventario.impuestos.impuestos')->with([
            'datos'=>$impuesto
        ]);
    }
    public static  function impuestonuevo(){
        if (!\Auth::check()){
            return redirect('/login');
        }
        return \View::make('inventario.impuestos.impuestosnuevo');
    }
    public static function impuestocrear(Request $request){
        if (!\Auth::check()){
            return redirect('/login');
        }
        \DB::beginTransaction();
        try{
            Impuestos::Create([
                'descripcion'=>$request->descripcion,
                'estado'=>$request->estado,
                'porcentaje'=>$request->porcentaje
            ]);
            \DB::commit();
            return redirect('/inventario/impuestos.index')->with('status', 'El impuesto se guardo correctamente');
        }catch (\Exception $e){
            \DB::rollback();
            return back()->with('status', 'Error:'.$e->getMessage());
        }

    }
    public static function impuestoeditar($numero){
        if (!\Auth::check()){
            return redirect('/login');
        }
        $numero=\Crypt::decrypt($numero);
        $impuesto=Impuestos::find($numero);
        return \View::make('inventario.impuestos.impuestoseditar')->with([
            'dato'=>$impuesto
        ]);
    }
    public static function impuestoactualizar(Request $request){
        if (!\Auth::check()){
            return redirect('/login');
        }
        \DB::beginTransaction();
        try{
            Impuestos::where('id','=',$request->id)->
            update([
                'descripcion'=>$request->descripcion,
                'estado'=>$request->estado,
                'porcentaje'=>$request->porcentaje
            ]);
            \DB::commit();
            return redirect('/inventario/impuestos.index')->with('status', 'El impuesto se guardo correctamente');
        }catch (\Exception $e){
            \DB::rollback();
            return back()->with('status', 'Error:'.$e->getMessage());
        }
    }
    public static function impuestoeliminar($numero){
        if (!\Auth::check()){
            return redirect('/login');
        }
        $numero=\Crypt::decrypt($numero);
        $impuesto=Impuestos::find($numero);

        return \View::make('inventario.impuestos.impuestoseliminar')->with([
            'dato'=>$impuesto
        ]);
    }
    public static function impuestodestruir(Request $request){
        if (!\Auth::check()){
            return redirect('/login');
        }
        $cantidad=Inventarios::where('impuesto_id','=',$request->id)->count();
        if($cantidad>0){
            return back()->with('status', 'Error: El impuesto no puede ser eliminado, tiene productos asociados');
        }
        \DB::beginTransaction();
        try{
            Impuestos::where('id','=',$request->id)->delete();
            \DB::commit();
            return redirect('/inventario/impuestos.index')->with('status', 'El impuesto se elimino correctamente');
        }catch (\Exception $e){
            \DB::rollback();
            return back()->with('status', 'Error:'.$e->getMessage());
        }
    }


    //PRODUCTOS!!
    public static function productosindex(){
        if (!\Auth::check()){
            return redirect('/login');
        }
        $productos=Productos::all();
        return \View::make('inventario.producto.productos')->with([
            'datos'=>$productos
        ]);
    }
    public static  function productosnuevo(){
        if (!\Auth::check()){
            return redirect('/login');
        }
        $impuestos=Impuestos::all()->pluck('porcentaje','id');

        return \View::make('inventario.producto.productosnuevo')->with([
            'impuestos'=>$impuestos
        ]);
    }
    public static function productoscrear(Request $request){
        if (!\Auth::check()){
            return redirect('/login');
        }
        \DB::beginTransaction();
        try{
            Productos::Create([
                'descripcion'=>$request->descripcion,
                'precio'=>$request->precio,
                'impuesto_id'=>$request->impuesto_id,
                'estado'=>$request->estado
            ]);
            \DB::commit();
            return redirect('/inventario/productos.index')->with('status', 'El producto se guardo correctamente');
        }catch (\Exception $e){
            \DB::rollback();
            return back()->with('status', 'Error:'.$e->getMessage());
        }

    }
    public static function productoseditar($numero){
        if (!\Auth::check()){
            return redirect('/login');
        }
        $numero=\Crypt::decrypt($numero);
        $productos=productos::find($numero);
          $impuestos=Impuestos::all()->pluck('porcentaje','id');
        return \View::make('inventario.producto.productoseditar')->with([
            'dato'=>$productos,
              'impuestos'=>$impuestos
        ]);
    }
    public static function productosactualizar(Request $request){
        if (!\Auth::check()){
            return redirect('/login');
        }
        \DB::beginTransaction();
        try{
            Productos::where('id','=',$request->id)->
            update([
              'descripcion'=>$request->descripcion,
              'precio'=>$request->precio,
              'impuesto_id'=>$request->impuesto_id,
              'estado'=>$request->estado
            ]);
            \DB::commit();
            return redirect('/inventario/productos.index')->with('status', 'El producto se guardo correctamente');
        }catch (\Exception $e){
            \DB::rollback();
            return back()->with('status', 'Error:'.$e->getMessage());
        }
    }
    public static function productoseliminar($numero){
        if (!\Auth::check()){
            return redirect('/login');
        }
        $numero=\Crypt::decrypt($numero);
        $productos=Productos::find($numero);
        return \View::make('inventario.producto.productoseliminar')->with([
            'dato'=>$productos
        ]);
    }
    public static function productosdestruir(Request $request){
        if (!\Auth::check()){
            return redirect('/login');
        }
        $cantidad=Productos::where('impuesto_id','=',$request->id)->count();
        if($cantidad>0){
            return back()->with('status', 'Error: El producto no puede ser eliminado, tiene productos asociados');
        }
        \DB::beginTransaction();
        try{
            Productos::where('id','=',$request->id)->delete();
            \DB::commit();
            return redirect('/inventario/productos.index')->with('status', 'El producto se elimino correctamente');
        }catch (\Exception $e){
            \DB::rollback();
            return back()->with('status', 'Error:'.$e->getMessage());
        }
    }

    //Clientes

    public static function clientesindex(){
        if (!\Auth::check()){
            return redirect('/login');
        }
        $cliente=Clientes::all();
        return \View::make('inventario.clientes.clientes')->with([
            'datos'=>$cliente
        ]);
    }
    public static  function clientesnuevo(){
        if (!\Auth::check()){
            return redirect('/login');
        }
        return \View::make('inventario.clientes.clientesnuevo');
    }
    public static function clientescrear(Request $request){
        if (!\Auth::check()){
            return redirect('/login');
        }
        \DB::beginTransaction();
        try{
            Clientes::Create([
                'nombre_cliente'=>$request->nombre_cliente,
                'identificacion'=>$request->identificacion,
                'dias_credito'=>$request->dias_credito,
                'tipo_pago'=>$request->tipo_pago
            ]);
            \DB::commit();
            return redirect('/inventario/clientes.index')->with('status', 'El cliente se guardo correctamente');
        }catch (\Exception $e){
            \DB::rollback();
            return back()->with('status', 'Error:'.$e->getMessage());
        }

    }
    public static function clienteseditar($numero){
        if (!\Auth::check()){
            return redirect('/login');
        }
        $numero=\Crypt::decrypt($numero);
        $cliente=Clientes::find($numero);
        return \View::make('inventario.clientes.clienteseditar')->with([
            'dato'=>$cliente
        ]);
    }
    public static function clientesactualizar(Request $request){
        if (!\Auth::check()){
            return redirect('/login');
        }
        \DB::beginTransaction();
        try{
            Clientes::where('id','=',$request->id)->
            update([
              'nombre_cliente'=>$request->nombre_cliente,
              'identificacion'=>$request->identificacion,
              'dias_credito'=>$request->dias_credito,
              'tipo_pago'=>$request->tipo_pago
            ]);
            \DB::commit();
            return redirect('/inventario/clientes.index')->with('status', 'El cliente se guardo correctamente');
        }catch (\Exception $e){
            \DB::rollback();
            return back()->with('status', 'Error:'.$e->getMessage());
        }
    }
    public static function clienteseliminar($numero){
        if (!\Auth::check()){
            return redirect('/login');
        }
        $numero=\Crypt::decrypt($numero);
        $cliente=Clientes::find($numero);
        return \View::make('inventario.clientes.clienteseliminar')->with([
            'dato'=>$cliente
        ]);
    }
    public static function clientesdestruir(Request $request){
        if (!\Auth::check()){
            return redirect('/login');
        }
        \DB::beginTransaction();
        try{
            Clientes::where('id','=',$request->id)->delete();
            \DB::commit();
            return redirect('/inventario/clientes.index')->with('status', 'El cliente se elimino correctamente');
        }catch (\Exception $e){
            \DB::rollback();
            return back()->with('status', 'Error:'.$e->getMessage());
        }
    }



}
