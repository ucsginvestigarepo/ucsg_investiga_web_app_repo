@extends('themes/lte/layaout')

@section('tituloForm')
<h2 class="text-center"><u>Mantenimiento Carreras</u></h2>
   <h3 class="text-center">Crear Carrera</h3>
@endsection

@section('contenedor')
       <div class='content-fluid'>
       
       <form action="/carrera/guardar" method="post">
            @csrf
            
            <div class="box-body">
                <div class="col-md-4 col-md-offset-4">
                    <div class="form-group">
                      <label for="">Carrera</label>
                      <input type="text" class="form-control" id="carrera" placeholder="Carrera" name="carrera">
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Facultad</label>
                        <div class="col-sm-10">
                            <select name="facultad" id="facultad" class="form-control" required>
                              @foreach ($facultad as $item)
                                    <option value={{ $item['id']}}>{{ $item['nombre']}}</option>
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