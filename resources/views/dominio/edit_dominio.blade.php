@extends('themes/lte/layaout')

@section('tituloForm')
   <h3>Editar Dominio</h3>
@endsection

@section('contenedor')
       <div class='content-fluid'>
       <form method="post" action="/dominio/actualizar" >
            @csrf
            <div class="box-body">
                    <div class="form-group">
                        <label for="">Id</label>
                        <input type="text" class="form-control" id="id" name="id" value="{{$datos->id}}" readonly>
                        <label for="">Dominio</label>
                        <input type="text" class="form-control" id="dominio" placeholder="Dominio" name="dominio" value="{{$datos->nombre}}">
                    </div>
                    
            </div> 
            <div class="box-footer">
                    <button type="submit" class="btn btn-success pull-right"><i class="fa fa-save"></i>  Guardar</button>
                    <a href="{{ url('dominio') }}" class="btn btn-danger pull-leff"><i class="fa fa-undo"></i>  Regresar</a>
            </div>  
        </div>
       </form>
@endsection