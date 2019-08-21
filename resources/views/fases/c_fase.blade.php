@extends('themes/lte/layaout')

<style type="text/css">
  
</style>

@section('tituloForm')
 <h2 class="text-center"><U>Mantenimiento Cronograma</U></h2>
   <h3 class="text-center">Crear Fase</h3>
@endsection

@section('contenedor')
       <div class='content-fluid'>
       @if($errors->any())
          <div class="alert alert-primary"><h4>{{$errors->first()}}</h4></div>
       @endif
       <form action="/fases/guardar" method="post">
            @csrf
            <div class="box-body">
                    <div class="form-group">
                      <label for="">Nombre</label>
                      <input type="text" class="form-control" id="nombre" placeholder="nombre" name="nombre">
                    </div>
                    <div class="form-group">
                        <label>Desde</label>
        
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" class="form-control pull-right" name="desde" id="datepicker" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                        </div>
                        <!-- /.input group -->
                      </div>
                      <div class="form-group">
                        <label>Hasta</label>
        
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" class="form-control pull-right" name="hasta" id="datepicker2">
                        </div>
                        <!-- /.input group -->
                      </div>
                    
            </div> 
            <div class="box-footer">
                    <button type="submit" class="btn btn-success pull-right"><i class="fa fa-save"></i>  Guardar</button>
                    <a href="{{ url('fases') }}" class="btn btn-danger pull-leff"><i class="fa fa-undo"></i>  Regresar</a>
            </div>  
        </div>
       </form>
@endsection