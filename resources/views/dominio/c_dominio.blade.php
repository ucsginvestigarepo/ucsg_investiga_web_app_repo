@extends('themes/lte/layaout')

@section('tituloForm')
<h2 class="text-center"><U>Mantenimiento Dominios</U></h2>
   <h3  class="text-center">Crear Dominio</h3>
@endsection

@section('contenedor')
       <div class='content-fluid'>
       <form action="/dominio/guardar" method="post">
            @csrf
            <div class="box-body">
                    <div class="form-group">
                      <label for="">Dominio</label>
                      <input type="text" class="form-control" id="dominio" placeholder="Dominio" name="dominio">
                    </div>
                    
            </div> 
            <div class="box-footer">
                    <button type="submit" class="btn btn-success pull-right"><i class="fa fa-save"></i>  Guardar</button>
                    <a href="{{ url('dominio') }}" class="btn btn-danger pull-leff"><i class="fa fa-undo"></i>  Regresar</a>
            </div>  
        </div>
       </form>
@endsection