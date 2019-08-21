@extends('themes/lte/layaout')
@extends('themes/lte/header_table')

@section('tituloForm')
    <h2 class="text-center"><u>Mantemiento/Facultad</u></h2>
   <h3 class="text-center">Listado de Facultades de la Universidad</h3>
   <a href="{{ url('facultad/crear') }}" class="btn btn-success"><i class="fa fa-plus"></i>  Crear facultad</a>
   <a href="{{ url('submenu') }}" class="btn btn-primary pull-right"><i class="fa fa-undo"></i>  Regresar</a>
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
                        <th>Facultad</th>
                        <th></th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datos as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->nombre}}</td> 
                            <td align='center'><a href="{{ url('facultad/editar/'.$item->id) }}" class="btn btn-warning pull-center"><i class="fa fa-edit"></i>  Editar</a></td> 
                        </tr>
                    @endforeach
                </tbody>
                
            </table>
            </form>
        </div>
       </div>
@endsection

@extends('es_datatables/sp_datatables_lang')