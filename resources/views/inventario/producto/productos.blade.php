@extends('adminlte::layouts.app')
@section('htmlheader_title') Productos @endsection
@section('contentheader_title')
  <h1>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-barcode"></i>Productos</a></li>
    <li class="active">Productos</li>
  </ol>
@endsection
  @section('main-content')
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
          <h3 class="page-header">

              <a class="btn btn-primary" href="{{ url('/inventario/productos.nuevo/') }}">
                <i class="fa fa-plus"></i> Nuevo producto
              </a>

          </h3>
        </div>
      </div>
    </div>
    <div class="container-fluid spark-screen">
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">Productos</div>
            <div class="panel-body">
              <table class="table table-striped table-condensed" id="datos">
                <thead>
                  <th>Id</th>
                  <th>Descripcion</th>
                  <th>Precio</th>
                  <th>Impuesto</th>
                  <th>estado</th>
                </thead>
                <tbody>
                  @if(count($datos)>0)
                    @foreach ($datos as $doc)
                      <tr>
                        <td>{{ $doc->id}}</td>
                        <td>{{ $doc->descripcion}}</td>
                        <td>{{ $doc->precio}}</td>
                        <td>{{ $doc->impuesto_id}}</td>
                        <td>{{ $doc->estado}}</td>
                        <td>
                          @if($doc->estado==1)
                            {{ 'Habilitado'}}
                          @else
                            {{ 'Deshabilitado'}}
                          @endif
                        </td>
                        <td>
                          <div class="btn-group">

                              <a class="btn btn-primary" href="{{ url('inventario/productos.editar/'.Crypt::encrypt($doc->id))}}">
                                <i class="fa fa-pencil fa-fw"></i>
                              </a>

                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <span class="caret"></span>
                              <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu">
                              <li role="separator" class="divider"></li>

                                <li><a href="{{ url('inventario/productos.eliminar/'.Crypt::encrypt($doc->id))}}" ><i class="fa fa-trash-o fa-fw"></i>Eliminar</a></li>

                            </ul>
                          </div>
                        </td>
                      </tr>
                    @endforeach
                  @endif
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
    $(document).ready(function(){
      $('#datos').DataTable({
        responsive: true,
        "language": {
          "lengthMenu": "Mostrar _MENU_ registros por pagina",
          "zeroRecords": "No se encontraron registros que mostrar",
          "info": "Mostrando pagina _PAGE_ de _PAGES_",
          "infoEmpty": "No hay registros disponibles",
          "infoFiltered": "(filtrados de _MAX_ total registros)",
          "search": "Buscar"

        },
        "order": [[ 0, "desc" ]],
        responsive: true
      });
      $("body").on("contextmenu",function(e){
        return false;
      });
    });
    </script>
  @endsection
