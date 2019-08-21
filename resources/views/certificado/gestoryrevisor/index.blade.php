@extends('themes/lte/layaout')
@extends('themes/lte/header_table')

<link rel="shortcut icon" href="{{asset('img/AppIconsUcsgInvestiga/AppIcon1024x1024.png')}}" />

@section('tituloForm')
   <h3 class="text-center">Generación de certificados - <STRONG>GESTOR-REVISOR</STRONG></h3>
   
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
                        <th>Año registro</th>
                        <th>Cédula</th>
                        <th>Nombres</th>
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
                        <tr>
                            <td>{{$item->ano}}</td>
                            <td>{{$item->cedula}}</td> 
                            <td>{{$item->nombres}}</td> 
                            <td>{{$item->email}}</td> 
                            <td>{{$item->rol}}</td> 
                            <td>{{$item->certificado}}</td>
                            <td align='center'><a href="{{ url('certificado/gestoryrevisor/modelo/'.$item->id) }}" class="btn btn-warning pull-center"><i class="fa fa-download"></i>  Descargar</a></td> 
                            <td align='center'><a href="{{ url('enviarCertificado_Gestor_Revisor/'.$item->id) }}" class="btn btn-success pull-center"><i class="fa fa-envelope"></i>  Enviar</a></td> 
                        </tr>
                    @endforeach
               
                </tbody>
                
            </table>
            
            </form>
        </div>
        </div>
@endsection

@extends('es_datatables/sp_datatables_lang')