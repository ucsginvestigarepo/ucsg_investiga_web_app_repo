@extends('themes/lte/layaout')
@extends('themes/lte/header_table')

@section('tituloForm')
   <h2 class="text-center"><u>Mantemiento/Publicación</u></h2>
   <h3 class="text-center">Mi propuesta</h3>
   <a href="{{ url('publicacion/crear') }}" class="btn btn-success"><i class="fa fa-plus"></i>  Crear propuesta</a>
   <a href="{{ url('menu') }}" class="btn btn-primary pull-right"><i class="fa fa-undo"></i>  Regresar</a>
@endsection

@section('contenedor')
       <div class='content-fluid'>
            <div class="desplazamiento">

            <form action="" method="">
                @csrf
            
            <table id="example1" class="table table-bordered table-striped" >
                
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Propuesta</th>
                        <th>Descripción</th>
                        <th>Nota</th>
                        <th>Estado</th>
                        <th>Archivo</th>
                        <th></th>
                        
                    </tr>
                </thead>
                <tbody> 
                    @foreach ($datos as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->nombrepropuesta}}</td> 
                            <td>{{$item->descripciontema}}</td> 
                            <td>
                                @foreach ($calificacion as $item2)
                                    @if ($item2->idPropuesta==$item->id)
                                       {{(int)$item2->nota}}
                                    @else
                                       
                                    @endif
                                @endforeach
                            </td> 
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
                                @case("REVISADO")
                                    <td bgcolor="#9DE973">{{$item->nombreestado}}</td>
                                 @break
                                @default
                                    <td>{{$item->nombreestado}}</td>
                            @endswitch 
                            <td align='center'><a href="{{ url('publicacion/storage/'.$item->rutaarchivo) }}" class="btn btn-success pull-center"><i class="fa fa-eye"></i>  Ver</a></td> 
                            <td align='center'><a href="{{ url('publicacion/editar/'.$item->id) }}" class="btn btn-warning pull-center"><i class="fa fa-edit"></i>  Editar</a></td> 
                            <!--<td align='center'><a href="{{ url('publicacion/eliminar/'.$item->id) }}" class="btn btn-danger pull-center" ><i class="fa fa-ban"></i>  Eliminar</a></td> -->
                        </tr>
                    @endforeach
                </tbody>
                
            </table>
            
            </form>
        </div>
        </div>
@endsection

@extends('es_datatables/sp_datatables_lang')