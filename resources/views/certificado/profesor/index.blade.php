@extends('themes/lte/layaout')
@extends('themes/lte/header_table')

@section('tituloForm')
   <h3 class="text-center">Generación de certificados - <STRONG>GANADORES</STRONG></h3>
   
   <a href="{{ url('menu') }}" class="btn btn-primary pull-right"><i class="fa fa-undo"></i>  Regresar</a>
@endsection

@section('contenedor')
       <div class='content-fluid'>
            <div class="desplazamiento">

            <form action="" method="">
                @csrf

                @foreach ($final as $item2)
                 @if ($item2->desde<=date('Y-m-d') && $item2->hasta>=date('Y-m-d'))
                    <h3 class="text-center" style="background-color: lightgray;padding: 0.5em;">Ganadores globales  de los 2 primeros lugares del concurso por dominio</h3>
                    <table id="example1" class="table table-striped table-bordered" style="width:100%" >
                     
                     <thead>
                         <tr>
                             <th></th>
                             <th>Año Ganador</th>
                             <th>Dominio</th>
                             <th>Propuesta</th>
                             <th>Nombre</th>
                             <th>Nota</th>
                             <th>Correo</th>
                             <th>Rol</th>
                             <th>Enviado</th>
                             <th></th>
                             <th></th>
                             
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
                                    <td><img src="{{asset('img/oro.png')}}" class="user-image" alt="User Image" width="80" height="30"></td>
                                 @else
                                    <td><img src="{{asset('img/bronce.png')}}" class="user-image" alt="User Image" width="80" height="30"></td>
                                 @endif                          
                                 <td>{{$item->ano}}</td>
                                 <td>{{$item->dominio}}</td> 
                                 <td>{{$item->nombrepropuesta}}</td> 
                                 <td>{{$item->nombre}}</td> 
                                 <td>{{(int)$item->nota}}</td> 
                                 <td>{{$item->email}}</td> 
                                 <td>{{$item->rol}}</td> 
                                 <td>{{$item->certificado}}</td> 
                                  <td align='center'><a href="{{ url('certificado/profesor/modelo/'.$item->idUSuario) }}" class="btn btn-warning pull-center"><i class="fa fa-download"></i>  Descargar</a></td> 
                                  <td align='center'><a href="{{ url('enviarCertificado_Profesor/'.$item->idUSuario) }}" class="btn btn-success pull-center"><i class="fa fa-envelope"></i>  Enviar</a></td> 

                             </tr>
                         @endforeach
                     </tbody>
                     
                      </table>
                 @else
                     <h3>Los Ganadores globales  se presentaran al final del concurso</h3>
                     <h4>Fecha final: {{$item2->desde}}</h4>
                 @endif               
            @endforeach


            
            </form>
        </div>
        </div>
@endsection

@extends('es_datatables/sp_datatables_lang')