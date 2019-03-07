@extends('adminlte::layouts.app')
@section('htmlheader_title') Impuesto Eliminar @endsection
@section('contentheader_title')
  <h1>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-barcode"></i>Inventario</a></li>
    <li><a href="{{ url('inventario/impuestos.index') }}"><i class="fa fa-list"></i> Impuestos</a></li>
    <li class="active">Eliminar</li>
  </ol>
@endsection
  @section('main-content')
    {{ Form::open(array('url' => '/inventario/impuestos.destruir')) }}
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
            <div class="panel-heading">Eliminar Producto</div>
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
                    <label class='control-sidebar-subheading' for="fecha">Descripcion</label>
                    {{Form::text('descripcion',$dato->descripcion,['class'=>'form-control','id'=>'descripcion','required' => 'required',"maxlength"=>"255"])}}
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <label class='control-sidebar-subheading' for="fecha">Porcentaje</label>
                    {{Form::number('porcentaje',$dato->porcentaje,['class'=>'form-control','id'=>'porcentaje','required' => 'required',"step"=>"any"])}}
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <label class='control-sidebar-subheading' for="fecha">Estado</label>
                      {{ Form::select('estado', ['1'=>'Habilitado','0'=>'Deshabilitado'], $dato->estado,array('class'=>'form-control')) }}
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
