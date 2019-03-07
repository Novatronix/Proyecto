<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group([ 'prefix' => 'inventario' ,'middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
    Route::get('impuestos.index',[
        'as'=>'impuestos.index',
        'uses'=>'Inventario@impuestosindex'
    ]);
    Route::get('impuestos.nuevo',[
        'as'=>'impuestos.nuevo',
        'uses'=>'Inventario@impuestonuevo'
    ]);
    Route::post('impuestos.crear',[
        'as'=>'impuestos.crear',
        'uses'=>'Inventario@impuestocrear'
    ]);
    Route::get('impuestos.editar/{numero}',[
        'as'=>'impuestos.editar',
        'uses'=>'Inventario@impuestoeditar'
    ]);
    Route::post('impuestos.actualizar',[
        'as'=>'impuestos.actualizar',
        'uses'=>'Inventario@impuestoactualizar'
    ]);
    Route::get('impuestos.eliminar/{numero}',[
        'as'=>'impuestos.eliminar',
        'uses'=>'Inventario@impuestoeliminar'
    ]);
    Route::post('impuestos.destruir',[
        'as'=>'impuestos.destruir',
        'uses'=>'Inventario@impuestodestruir'
    ]);

    //  Productos!!!

    Route::get('productos.index',[
        'as'=>'productos.index',
        'uses'=>'Inventario@productosindex'
    ]);
    Route::get('productos.nuevo',[
        'as'=>'productos.nuevo',
        'uses'=>'Inventario@productosnuevo'
    ]);
    Route::post('productos.crear',[
        'as'=>'productos.crear',
        'uses'=>'Inventario@productoscrear'
    ]);
    Route::get('productos.editar/{numero}',[
        'as'=>'productos.editar',
        'uses'=>'Inventario@productoseditar'
    ]);
    Route::post('productos.actualizar',[
        'as'=>'productos.actualizar',
        'uses'=>'Inventario@productosactualizar'
    ]);
    Route::get('productos.eliminar/{numero}',[
        'as'=>'productos.eliminar',
        'uses'=>'Inventario@productoseliminar'
    ]);
    Route::post('productos.destruir',[
        'as'=>'productos.destruir',
        'uses'=>'Inventario@productosdestruir'
    ]);
});
