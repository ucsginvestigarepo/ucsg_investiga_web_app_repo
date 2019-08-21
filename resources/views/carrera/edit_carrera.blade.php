@extends('themes/lte/layaout')

@section('tituloForm')
   <h3>Editar Carrera</h3>
@endsection

@section('contenedor')
       <div class='content-fluid'>
       
       <form action="/carrera/actualizar" method="post">
            @csrf
            
            <div class="box-body">
                <div class="col-md-4 col-md-offset-4">
                    <label for="">Id</label>
                    <input type="text" class="form-control" id="id" name="id" value="{{$datos->id}}" readonly>
                    <div class="form-group">
                      <label for="">Carrera</label>
                      <input type="text" class="form-control" id="carrera" placeholder="Carrera" name="carrera" value="{{$datos->nombre}}">
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Facultad</label>
                        <div class="col-sm-10">
                            <select name="facultad" id="facultad" class="form-control" required>
                              @foreach ($facultad as $item)
                                    @if ($datos->idFacultad==$item['id'])
                                        <option value={{ $item['id']}} selected>{{ $item['nombre']}}</option>
                                    @else
                                        <option value={{ $item['id']}}>{{ $item['nombre']}}</option>
                                    @endif
                               @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="box-footer">
                            <button type="submit" class="btn btn-success pull-right"><i class="fa fa-save"></i>  Guardar</button>
                            <a href="{{ url('carrera') }}" class="btn btn-danger pull-leff"><i class="fa fa-undo"></i>  Regresar</a>
                    </div>  
                </div>
            </div> 
        
            
        </div>
       </form>
@endsection