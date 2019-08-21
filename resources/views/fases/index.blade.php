@extends('themes/lte/layaout')
@extends('themes/lte/header_table')

@section('tituloForm')
   <h2 class="text-center"><u>Mantemiento/Cronograma</u></h2>
   <h3 class="text-center">Listado de fases del concurso - CRONOGRAMA</h3>
   <a href="{{ url('fases/crear') }}" class="btn btn-success"><i class="fa fa-plus"></i>  Crear fase</a>
   <a href="{{ url('menu') }}" class="btn btn-primary pull-right"><i class="fa fa-undo"></i>  Regresar</a>
@endsection

@section('contenedor')
       <div class='content-fluid'>
            <div class="desplazamiento">

            <form action="" method="">
                @csrf
  
            <table id="example1" class="table table-bordered table-striped">
                
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Año</th>
                        <th>Estado</th>
                        <th>Desde</th>
                        <th>Hasta</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datos as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->nombre}}</td> 
                            <td>{{$item->anio}}</td>
                            <td>{{$item->nombreestado}}</td> 
                            <td>{{$item->fechadesde}}</td> 
                            <td>{{$item->fechahasta}}</td> 
                            <td align='center'><a href="{{ url('fases/editar/'.$item->id) }}" class="btn btn-warning pull-center"><i class="fa fa-edit"></i>  Editar</a></td> 
                            <td align='center'><a href="{{ url('fases/cambiaestado/'.$item->id.'/10') }}" class="btn btn-success pull-center" ><i class="fa fa-check"></i>  Activar</a></td>
                            <td align='center'><a href="{{ url('fases/cambiaestado/'.$item->id.'/11') }}" class="btn btn-danger pull-center" ><i class="fa fa-ban"></i>  Inactivar</a></td>  
                        </tr>
                    @endforeach
                </tbody>
                
            </table>
            </form>
        </div>
       </div>
@endsection

@extends('es_datatables/sp_datatables_lang')