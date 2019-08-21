@extends('themes/lte/layaout')

@section('tituloForm')
   <h3 class="text-center">Calificaciones</h3>
@endsection

<style type="text/css">
    .Color_Azul_Campeon{
        color: darkblue;
    }

    .RangoNotas_calificar{
        width: 100%;
        max-width: 100%;
    }

    .RangoNotas_calificar span{
        font-size: 1.2em;
        color: darkblue !important;
        font-weight: bold;
        font-family: monospace;
    }

    @media screen and (max-width: 935px) {
        .RangoNotas_calificar span::after{
            content: ' ';
            white-space: normal;
        }
    }
</style>

@section('contenedor')
       <div class='content-fluid'>
       <div class="desplazamiento">
           
        <h4>Tema:  <strong class="Color_Azul_Campeon">{{$datos->nombrepropuesta}}</strong></h4>

        @if ($calificacion)
            @if ($calificacion->nota<=39)
                <div class="alert alert-danger sm" role="alert">
                    <h4>Nota aplicada: {{$calificacion->nota}} puntos</h4>
                </div>
            @else
                @if ($calificacion->nota>=40 && $calificacion->nota<=79)
                    <div class="alert alert-warning sm" role="alert">
                        <h4>Nota aplicada: {{$calificacion->nota}} puntos</h4>
                </div>
                @else
                    <div class="alert alert-success sm" role="alert">
                        <h4>Nota aplicada: {{$calificacion->nota}} puntos</h4>
                </div>
                @endif
            @endif
            
        @else
            <div class="alert alert-danger sm" role="alert">
                <h4>Nota aplicada: 0 puntos</h4>
            </div>
        @endif
        @if($errors->any())
        <div class="alert alert-danger"><h4>{{$errors->first()}}</h4></div>
        @endif
        
                <div class="box-body">
                     <div class="alert alert-info RangoNotas_calificar" role="alert">
                        <span>Las notas a aplicar deben de ser: </span> <span>Número entero mayor e igual a 0!!!</span> </span></div>
                        <table class="table table-hover table-sm">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Objeto</th>
                                    <!--<th scope="col">Descripción</th>-->
                                    <th scope="col">Nota Máxima</th>
                                    <th scope="col">Nota</th>
                                    <th scope="col">Calificación</th>
                                  </tr>
                                </thead>
                                <tbody>
                                <form action="/calificacion/guardar" method="post">
                                @foreach ($temas as $item)
                                    @csrf
                                    <input type="text" value={{$datos->id}} name="idpropuesta" hidden>
                                    <input type="text" value={{$datos->idEstado}} name="idestado" hidden>
                                    <tr>
                                        <th scope="row"><input type="text" value={{$item->id}} name="idtema[]" hidden>*</th>
                                        <td>{{$item['nombre']}}</td>
                                        <!--<td>{{$item['descripcion']}}</td>-->
                                        <td>{{$item['nota'].' puntos'}}</td>
                                        <td>
                                            {{$item['califica']}}
                                            
                                        </td>
                                        <td>
                                            <div class="col">
                                                <input type="number" style="width : 50px; heigth : 20px" name="nota[]" min='0' max={{$item['nota']}} pattern="[0-9]" required>
                                            </div>
                                        </td>
                                        <td>
                                        </td>
                                    </tr>
                                
                                @endforeach
                                </tbody>
                        </table>     
                        
                            </div> 
                            <div class="box-footer">
                                    <button type="submit" class="btn btn-success pull-rigth"><i class="fa fa-save"></i>  Guardar</button>
                                    <a href="{{ url('calificacion') }}" class="btn btn-danger pull-leff"><i class="fa fa-undo"></i>  Regresar</a>
                            </div> 
                            </form> 
            </div>
        
       </div>
@endsection

@extends('es_datatables/sp_datatables_lang')