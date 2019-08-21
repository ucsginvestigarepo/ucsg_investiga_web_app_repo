@extends('themes/lte/layaout')

@section('tituloForm')
   <h3>Editar estado</h3>
@endsection

@section('contenedor')
       <div class='content-fluid'>
       <form method="post" action="/estado/actualizar" >
            @csrf
            <div class="box-body">
                    <div class="form-group">
                        <label for="">Id</label>
                        <input type="text" class="form-control" id="id" name="id" value="{{$estado->id}}" readonly>
                        <label for="">Estado</label>
                        <input type="text" class="form-control" id="estado" placeholder="Estado" name="estado" value="{{$estado->nombre}}">
                    </div>
                    
            </div> 
            <div class="box-footer">
                    <button type="submit" class="btn btn-success pull-right"><i class="fa fa-save"></i>  Guardar</button>
                    <a href="{{ url('estado') }}" class="btn btn-danger pull-leff"><i class="fa fa-undo"></i>  Regresar</a>
            </div>  
        </div>
       </form>
@endsection