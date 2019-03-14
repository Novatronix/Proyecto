@extends('adminlte::layouts.app')
@section('htmlheader_title') Cliente Eliminar @endsection
@section('contentheader_title')
  <h1>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-barcode"></i>Inventario</a></li>
    <li><a href="{{ url('inventario/impuestos.index') }}"><i class="fa fa-list"></i> Clientes</a></li>
    <li class="active">Eliminar</li>
  </ol>
@endsection
  @section('main-content')
    {{ Form::open(array('url' => '/inventario/clientes.destruir')) }}
    <div class="container-fluid spark-screen">
      <div class="row">
        <div class="col-md-12">
          <h3 class="page-header">
            @if (session('status'))
              <div class="alert alert-info">
                {{ session('status') }}
              </div>
            @endif

          </h3>
        </div>
      </div>
    </div>
    <div class="container-fluid spark-screen">
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">Eliminar Cliente</div>
            <div class="panel-body">
              <div class="col-md-4"></div>
              <div class="col-md-4">
                <div class="row">
                  <div class="col-sm-12">
                    <label class='control-sidebar-subheading' for="fecha">Codigo</label>
                    {{Form::text('id',$dato->id,['class'=>'form-control','id'=>'id','required' => 'required',"maxlength"=>"255",'readonly'=>true])}}
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <label class='control-sidebar-subheading' for="fecha">Nombre del Cliente</label>
                    {{Form::text('nombre_cliente',$dato->nombre_cliente,['class'=>'form-control','nombre_cliente'=>'nombre_cliente','required' => 'required',"maxlength"=>"255",'readonly'=>true])}}
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <label class='control-sidebar-subheading' for="fecha">Identificacion</label>
                    {{Form::text('identificacion',$dato->identificacion,['class'=>'form-control','identificacion'=>'identificacion','required' => 'required',"maxlength"=>"255",'readonly'=>true])}}
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <label class='control-sidebar-subheading' for="fecha">Dias de Credito</label>
                    {{Form::text('dias_credito',$dato->dias_credito,['class'=>'form-control','dias_credito'=>'dias_credito','required' => 'required',"maxlength"=>"255",'readonly'=>true])}}
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-12">
                    <label class='control-sidebar-subheading' for="fecha">Tipo de Pago</label>
                      {{ Form::select('estado', ['Credito'=>'Credito','Contado'=>'Contado'], $dato->estado,array('class'=>'form-control','disabled'=>'disabled')) }}
                  </div>
                </div>
                <div class="row">
                   <div class="col-sm-12">
                      <br>
                     {{Form::submit('Eliminar',['class'=>'btn btn-danger fa fa-floppy-o'])}}
                   </div>
                </div>
              </div>
              <div class="col-md-4"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    {{ Form::close() }}
    <script>
    $(document).on('keypress',function(e){
      if(e.which == 13) {
        e.preventDefault();
      }
    });
    </script>
  @endsection
