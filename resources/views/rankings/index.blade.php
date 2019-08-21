@extends('themes/lte/layaout')
@extends('themes/lte/header_table')

<style type="text/css">
    tr:hover{
        background-color: cyan !important;
    }
</style>

@section('tituloForm')
   <h2 class="text-center"><u>Rankings</u></h2>
   <h3 class="text-center">Posiciones en el concurso</h3>
   
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
                        $contador+=1;
                    @endphp
                        <tr>
                            <td>{{$contador}}</td>         
                            <td>{{$item->ano}}</td>
                            <td>{{$item->nombre}}</td> 
                            <td>{{$item->dominio}}</td> 
                            <td>{{$item->nombrepropuesta}}</td> 
                            <td>{{(int)$item->nota}}</td> 
                        </tr>
                    @endforeach
                </tbody>
                
            </table>
            
            </form>
        </div>
        </div>
@endsection

@extends('es_datatables/sp_datatables_lang')