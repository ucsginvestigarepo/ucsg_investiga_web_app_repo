@extends('themes/lte/layaout')
@extends('themes/lte/header_table')

@section('tituloForm')
   <h3 class="text-center">Listado de propuesta a revisar por Gestor</h3>
   <a href="{{ url('menu') }}" class="btn btn-primary pull-right"><i class="fa fa-undo"></i>  Regresar</a>
@endsection

@section('contenedor')
       <div class='content-fluid'>
            <div class="desplazamiento">
            @if($errors->any())
                <div class="alert alert-danger"><h4>{{$errors->first()}}</h4></div>
            @endif

            @if (session()->has('flash'))
                <div class="alert alert-primary"><h4> {{ session('flash')}}</h4></div>
            @endif
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
                        <th>Gestor</th>
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
                                @case("REVISADO")
                                    <td bgcolor="#9DE973">{{$item->nombreestado}}</td>
                                    @break
                                @default
                                    <td>{{$item->nombreestado}}</td>
                            @endswitch
                            <td align="center"><a href="{{ url('publicacion/storage/'.$item->rutaarchivo) }}" class="btn btn-success pull-center"><i class="fa fa-eye"></i>  Ver</a></td>
                            <td>{{$item->gestor}}</td>
                            <td align='center'><a href="{{ url('gestion/aplicanota/'.$item->id) }}" class="btn btn-warning pull-center" ><i class="fa fa-check"></i>  Revisar</a></td>
                            <!--<td align='center'><a href="{{ url('gestion/actualizaestado/'.$item->id) }}" class="btn btn-danger pull-center" ><i class="fa fa-ban"></i>  Rechazar</a></td> -->

                        </tr>
                    @endforeach
                </tbody>
                
            </table>
            </form>
        </div>
       </div>
@endsection

@extends('es_datatables/sp_datatables_lang')