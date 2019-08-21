@extends('themes/lte/layaout')
@extends('themes/lte/header_table')

@section('tituloForm')
   <h3 class="text-center">Listado de propuesta a calificar por Revisor</h3>
   <!-- <a href="{{ url('asignaciones/crear') }}" class="btn btn-success">Aplicar asignaciones</a> -->
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
                        <th>Dominio</th>
                        <th>Tema</th>
                        <th>Estado</th>
                        <th>Descargar</th>
                        <th>Nota</th>
                        <th>Revisor 1</th>
                        <th>Revisor 2</th>
                        <th>Revisor 3</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datos as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->nombredominio}}</td> 
                            <td>{{$item->nombrepropuesta}}</td>
                            @switch($item->nombreestado)
                            @case("INGRESADO")
                            <td bgcolor="#7DFFEB">{{$item->nombreestado}}</td>
                                @break
                            @case("ASIGNADO")
                            <td bgcolor="#7DBEFF">{{$item->nombreestado}}</td>
                                @break
                            @case("CALIFICADO")
                            <td bgcolor="#BCFF7D">{{$item->nombreestado}}</td>
                                @break
                            @case("RECHAZADO")
                                <td bgcolor="#FF7D6B">{{$item->nombreestado}}</td>
                                @break
                            @case("RECALIFICAR")
                                <td bgcolor="#6BF4FF">{{$item->nombreestado}}</td>
                                @break
                            @case("PRECALIFICADO")
                                <td bgcolor="#FF6BFB">{{$item->nombreestado}}</td>
                                @break
                            @case("REVISADO")
                                <td bgcolor="#9DE973">{{$item->nombreestado}}</td>
                                @break
                            @default
                                <td>{{$item->nombreestado}}</td>
                            @endswitch
                            <td align="center"><a href="{{ url('publicacion/storage/'.$item->rutaarchivo) }}" class="btn btn-success pull-center"><i class="fa fa-eye"></i>  Ver</a></td>
                            <td>
                                @foreach ($calificacion as $item2)
                                    @if ($item2->idPropuesta==$item->id)
                                       {{(int)$item2->nota}}
                                    @else
                                       
                                    @endif
                                @endforeach
                            </td>
                            <td>{{$item->revisor}}</td>
                            <td>{{$item->revisor2}}</td>
                            <td>{{$item->revisor3}}</td>
                            <td align='center'><a href="{{ url('calificacion/aplicanota/'.$item->id) }}" class="btn btn-warning pull-center" ><i class="fa fa-check"></i>  Calificar</a></td> 
                        </tr>
                    @endforeach
                </tbody>
                
            </table>
            </form>
        </div>
       </div>
@endsection

@extends('es_datatables/sp_datatables_lang')