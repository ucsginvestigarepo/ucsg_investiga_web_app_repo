@extends('themes/lte/layaout')
@extends('themes/lte/header_table')

@section('tituloForm')
   <h3 class="text-center">Listado de Asignaciones</h3>
   <a href="{{ url('asignaciones/crear') }}" class="btn btn-success"><i class="fa fa-check"></i>  Aplicar asignaciones</a>
   <a href="{{ url('menu') }}" class="btn btn-primary pull-right"><i class="fa fa-undo"></i>  Regresar</a>
@endsection

@section('contenedor')
@if($errors->any())
<div class="alert alert-info"><h4>{{$errors->first()}}</h4></div>
@endif   
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
                        <th>Profesor</th>
                        <th>Estado</th>
                        <th>Gestor</th>
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
                            <td>{{$item->nombreusuario}}</td>
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
                           
                            <td>{{$item->gestor}}</td>
                            <td>{{$item->revisor}}</td>
                            <td>{{$item->revisor2}}</td>
                            <td>{{$item->revisor3}}</td>
                            <td align='center'><a href="{{ url('asignaciones/cambiaestado/'.$item->id.'/2') }}" class="btn btn-danger pull-center" ><i class="fa fa-ban"></i> Desasignar</a></td> 
                        </tr>
                    @endforeach
                </tbody>
                
            </table>
            </form>
        </div>
       </div>
@endsection

@extends('es_datatables/sp_datatables_lang')