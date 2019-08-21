@extends('themes/lte/layaout')

@section('tituloForm')
<h2 class="text-center"><U>Mantenimiento Facultades</U></h2>
   <h3 class="text-center">Crear Facultad</h3>
@endsection

@section('contenedor')
       <div class='content-fluid'>
       <form action="/facultad/guardar" method="post">
            @csrf
            <div class="box-body">
                    <div class="form-group">
                      <label for="">Facultad</label>
                      <input type="text" class="form-control" id="facultad" placeholder="Facultad" name="facultad">
                    </div>
                    
            </div> 
            <div class="box-footer">
                    <button type="submit" class="btn btn-success pull-right"><i class="fa fa-save"></i>  Guardar</button>
                    <a href="{{ url('facultad') }}" class="btn btn-danger pull-leff"><i class="fa fa-undo"></i>  Regresar</a>
            </div>  
        </div>
       </form>
@endsection