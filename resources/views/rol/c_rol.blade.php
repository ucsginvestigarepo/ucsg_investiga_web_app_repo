@extends('themes/lte/layaout')

@section('tituloForm')
<h2 class="text-center"><U>Mantenimiento Roles</U></h2>
   <h3 class="text-center">Crear Rol en el sistema</h3>
@endsection

@section('contenedor')
       <div class='content-fluid'>
       <form action="/rol/guardar" method="post">
            @csrf
            <div class="box-body">
                    <div class="form-group">
                      <label for="">Rol</label>
                      <input type="text" class="form-control" id="rol" placeholder="rol" name="rol">
                    </div>
                    
            </div> 
            <div class="box-footer">
                    <button type="submit" class="btn btn-success pull-right"><i class="fa fa-save"></i>  Guardar</button>
                    <a href="{{ url('rol') }}" class="btn btn-danger pull-leff"><i class="fa fa-undo"></i>  Regresar</a>
            </div>  
        </div>
       </form>
@endsection