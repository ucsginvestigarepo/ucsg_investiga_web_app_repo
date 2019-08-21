@extends('themes/lte/layaout')
@extends('themes/lte/header_table')

@section('tituloForm')
   <h3 class="text-center">Cree las asignaciones para cada tema</h3>
   <h4>Estimado usuario, asegurese de asignar el gestor y revisores para cada tema, una vez revisada la propuesta ya no podra generar reasignaciones.</h4>
   <a href="{{ url('asignaciones') }}" class="btn btn-primary pull-right"><i class="fa fa-undo"></i> Regresar</a>
@endsection

<style type="text/css">
    select{
        width: max-content !important;
    }
</style>

@section('contenedor')
       <div class='content-fluid'>
            @if($errors->any())
            <div class="alert alert-danger"><h4>{{$errors->first()}}</h4></div>
            @endif   
           <div class="desplazamiento">
                @csrf
  
            <table id="example" class="table table-bordered table-striped w-auto">
                
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
                    <form role="form" action="/asignaciones/guardar" method="POST">
                        @csrf
                        <tr>
                            <td><input type="text"  id="id" value="{{$item->id}}" placeholder="id" name="id" hidden>{{$item->id}}</td>
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
                                 @case("REVISADO")
                                    <td bgcolor="#9DE973">{{$item->nombreestado}}</td>
                                @break
                                @default
                            @endswitch
                            
                            <td>
                                <select name="gestor" id="gestor" class="form-control" required>
                                    <option value="">Seleccione</option>
                                    @foreach ($gestores as $item2)
                                        @if ($item2['id']==$item->gestor_id)
                                            <option value={{ $item2['id']}} selected>{{ $item2['name']}}</option>
                                        @else
                                            <option value={{ $item2['id']}}>{{ $item2['name']}}</option>
                                        @endif
                                       
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select name="revisor" id="revisor" class="form-control" required>
                                    <option value="">Seleccione</option>
                                    @foreach ($revisores as $item2)
                                         @if ($item2['id']==$item->revisor_id)
                                            <option value={{ $item2['id']}} selected>{{ $item2['name']}}</option>
                                        @else
                                            <option value={{ $item2['id']}}>{{ $item2['name']}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                    <select name="revisor2" id="revisor2" class="form-control" required>
                                        <option value="">Seleccione</option>
                                        @foreach ($revisores as $item2)
                                             @if ($item2['id']==$item->revisor_id2)
                                                <option value={{ $item2['id']}} selected>{{ $item2['name']}}</option>
                                            @else
                                                <option value={{ $item2['id']}}>{{ $item2['name']}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                             </td>
                             <td>
                                <select name="revisor3" id="revisor3" class="form-control" required>
                                    <option value="">Seleccione</option>
                                    @foreach ($revisores as $item3)
                                         @if ($item3['id']==$item->revisor_id3)
                                            <option value={{ $item3['id']}} selected>{{ $item3['name']}}</option>
                                        @else
                                            <option value={{ $item3['id']}}>{{ $item3['name']}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </td>
                            <td align='center'><button type="submit" class="btn btn-success pull-right"><i class="fa fa-save"></i> Guardar</button></td> 
                        </tr>
                        </form>
                    @endforeach
                    
                </tbody>
                
            </table>
           </div>
            
       </div>
@endsection

@extends('es_datatables/sp_datatables_lang')