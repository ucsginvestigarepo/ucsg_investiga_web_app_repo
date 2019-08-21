@extends('themes/lte/layaout')
@extends('themes/lte/header_table')

<style type="text/css">
    .titleGanadores{
        background-color: darkblue;
        color: white;
        border-radius: 0.5em;
    }

    tr:hover{
        background-color: cyan !important;
    }
</style>

@section('tituloForm')
<h3 class="text-uppercase text-center titleGanadores" style="padding: 0.5em;">Ganadores del concurso periodo <strong>{{date('Y')}}</strong></h3>
   
   <a href="{{ url('menu') }}" class="btn btn-primary pull-right"><i class="fa fa-undo"></i>  Regresar</a>
@endsection

@section('contenedor')
       <div class='content-fluid'>
            <div class="desplazamiento">

            
                @csrf
            
            @foreach ($final as $item2)
                 @if ($item2->desde<=date('Y-m-d') && $item2->hasta>=date('Y-m-d'))
                    <h3 class="text-center" style="background-color: lightgray;padding: 0.5em;">Ganadores globales  de los 2 primeros lugares del concurso por dominio</h3>
                    <table id="example1" class="table table-striped table-bordered" style="width:100%" >
                     
                     <thead>
                         <tr>
                             <th></th>
                             <th>Año</th>
                             <th>Profesor</th>
                             <th>Dominio</th>
                             <th>Propuesta</th>
                             <th>Nota</th>
                             
                         </tr>
                     </thead>
                     <tbody>
                         @php
                             $contador=0;
                         @endphp 
                         
                         @foreach ($datos as $item)
                         @php
                             $contador+=0;
                         @endphp
                             <tr>
                                
                                 @if ($item->row_number==1)
                                    <td><img src="{{asset('img/oro.png')}}" class="user-image" alt="User Image"></td>
                                 @else
                                    <td><img src="{{asset('img/bronce.png')}}" class="user-image" alt="User Image"></td>
                                 @endif                          
                                 <td>{{$item->ano}}</td>
                                 <td>{{$item->nombre}}</td> 
                                 <td>{{$item->dominio}}</td> 
                                 <td>{{$item->nombrepropuesta}}</td> 
                                 <td>{{(int)$item->nota}}</td> 
                             </tr>
                         @endforeach
                     </tbody>
                     
                      </table>
                 @else
                     <h3>Los Ganadores globales  se presentaran al final del concurso</h3>
                     <h4>Fecha final: {{$item2->desde}}</h4>
                 @endif               
            @endforeach

            
        </div>
        </div>
@endsection

@extends('es_datatables/sp_datatables_lang')