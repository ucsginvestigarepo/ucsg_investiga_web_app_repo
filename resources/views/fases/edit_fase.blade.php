@extends('themes/lte/layaout')

@section('tituloForm')
   <h3>Editar Cronograma</h3>
@endsection
@if($errors->any())
<div class="alert alert-primary"><h4>{{$errors->first()}}</h4></div>
@endif
@section('contenedor')
       <div class='content-fluid'>
       <form method="post" action="/fases/actualizar" >
            @csrf
            <div class="box-body">
                    <div class="form-group">
                        <label for="">Id</label>
                        <input type="text" class="form-control" id="id" name="id" value="{{$datos->id}}" readonly>
                        <label for="">Nombre</label>
                        <input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre" value="{{$datos->nombre}}">
                    </div>
                    <div class="form-group">
                        <label>Desde</label>
        
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" class="form-control pull-right" name="desde" id="datepicker" value="{{$datos->fechadesde}}">
                        </div>
                        <!-- /.input group -->
                      </div>
                      <div class="form-group">
                        <label>Hasta</label>
        
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" class="form-control pull-right" name="hasta" id="datepicker2" value="{{$datos->fechahasta}}">
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