@extends('themes/lte/layaout')

@section('tituloForm')
    <h2 class="text-center"><u>Mantemiento/Publicación</u></h2>
   <h3 class="text-center">Subir Publicación científica</h3>

@endsection

<style type="text/css">
  .asterisco{
    font-size: 1.8em;
    color: crimson;
  }

  .blank{
    font-size: 1.8em;
    color: white;
  }

</style>

@section('contenedor')
@if($errors->any())
<div class="alert alert-warning"><h4>{{$errors->first()}}</h4></div>
@endif

       <div class='content-fluid'>
       <form action="/publicacion/guardar" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
            @csrf
            <input type="text" id="id" value={{auth()->user()->id}} name="idusuario" hidden>

            <div class="box-body">
                    <div class="col-xs-8">
                       <div class="form-group">
                        <label for=""><span class="asterisco">*</span>
                             <i class="fa fa-book"></i>
                                Dominio</label>
                                                       
                            <select name="dominio" id="dominio" class="form-control" required>
                                <option value=''>--Escoja dominio del tema--</option>
                                @foreach ($dominio as $item)
                                    <option value={{ $item['id']}}>{{ $item['nombre']}}</option>
                                @endforeach
                            </select>
                            <label for=""><span class="asterisco">*</span>Cronograma de registro</label>
                            <select name="fase" id="fase" class="form-control">
                                    @foreach ($fases as $item)
                                        <option value={{ $item['id']}} selected>{{$item['nombre']}}</option>
                                    @endforeach
                                </select>
                            <label for=""><span class="asterisco">*</span>Propuesta</label>
                            <input type="text" class="form-control" id="nombre" placeholder="nombre" name="nombre" required>
                            
                            <label for=""><span class="asterisco">*</span>Descripción del tema</label>
                            <textarea class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" name="descripcion" required></textarea>
                            
                            <label for=""><span class="asterisco">*</span>Palabras claves</label>
                            <input type="text" class="form-control" id="clave" placeholder="clave" name="clave" required>
                            
                            <label for=""><span class="asterisco">*</span>Problema</label>
                            <input type="text" class="form-control" id="problema" placeholder="problema" name="problema" required>
                            
                            <label for=""><span class="asterisco">*</span>Solución del problema</label>
                            <textarea class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" name="solucion" required></textarea>
                        
                        </div> 
                   
                       <div class="form-group">
                            <label for=""><span class="asterisco">*</span>Por favor seleccione: <br>solo archivos de Word o PDF para la revisión</label>
                            <input type="file" class="form-control" name="file" accept="application/msword,application/pdf" required>
                       </div>

                        <div class="custom-control custom-checkbox">
                            <span class="asterisco">*</span><input type="checkbox" class="custom-control-input" id="defaultUnchecked" name="termino" required>
                            <label class="custom-control-label" for="defaultUnchecked">Acepta los términos y condiciones del concurso</label>
                        </div>
                      
                    </div>
                    
            </div> 
            <div class="box-footer">
                    <div class="col-xs-8">
                            <button type="submit" class="btn btn-success pull-left"><i class="fa fa-save"></i>  Guardar</button>
                            <a href="{{ url('publicacion') }}" class="btn btn-danger pull-right"><i class="fa fa-undo"></i>  Regresar</a>
                    </div>
                    
            </div>  
        </div>
       </form>
@endsection