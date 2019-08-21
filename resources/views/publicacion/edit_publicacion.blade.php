@extends('themes/lte/layaout')

@section('tituloForm')
   <h3>Editar Propuesta</h3>
@endsection

@section('contenedor')
@if($errors->any())
<div class="alert alert-warning"><h4>{{$errors->first()}}</h4></div>
@endif
       <div class='content-fluid'>
       <form method="post" action="/publicacion/actualizar" accept-charset="UTF-8" enctype="multipart/form-data">
            @csrf
            <div class="box-body">
                    <div class="col-xs-9">
                            <div class="form-group">
                                <label for=""><span></span>Id</label>
                                <input type="text" class="form-control" id="id" name="id" value="{{$datos->id}}" readonly>
                                <label for="">Dominio</label>
                                <select name="dominio" id="dominio" class="form-control" required>
                                     <option value=''>--Escoja dominio del tema--</option>
                                     @foreach ($dominio as $item)
                                        @if ($item['id']==$datos->idDominio)
                                            <option value={{ $item['id']}} selected>{{ $item['nombre']}}</option>
                                        @else
                                            <option value={{ $item['id']}}>{{ $item['nombre']}}</option>
                                        @endif
                                    @endforeach
                                     
                                 </select>   
                                 <label for="">Propuesta</label>
                                 <input type="text" class="form-control" id="nombre" placeholder="nombre" name="nombre" value="{{$datos->nombrepropuesta}}" required>
                                 <label for="">Descripción del tema</label>
                                 <textarea class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" name="descripcion"  required>{{$datos->descripciontema}}</textarea>
                                 <label for="">Palabras claves</label>
                                 <input type="text" class="form-control" id="clave" placeholder="clave" name="clave" value="{{$datos->palabraclave}}" required>
                                 <label for="">Problema</label>
                                 <input type="text" class="form-control" id="problema" placeholder="problema" name="problema" value="{{$datos->problema}}" required>
                                 <label for="">Solución del problema</label>
                                 <textarea class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" name="solucion"  required>{{$datos->solucionproblema}}</textarea>
                             
                             </div> 
                        
                            <div class="form-group">
                             
                                 <input type="file" class="btn btn-warning" name="file" accept="application/msword,application/pdf" required>
                            
                            </div>
     
                             <div class="custom-control custom-checkbox">
                                 @if ($datos->aceptatermino==1)
                                    <input type="checkbox" class="custom-control-input" id="defaultUnchecked" name="termino" checked disabled required>
                                 @else
                                    <input type="checkbox" class="custom-control-input" id="defaultUnchecked" name="termino" required>
                                 @endif
                                 <label class="custom-control-label" for="defaultUnchecked">Acepta los términos y condiciones del concurso</label>
                             </div>
                             
                                
                             
                    </div>
                    
            </div> 
            <div class="box-footer">
                <div class="col-xs-9">
                    <button type="submit" class="btn btn-success pull-left"><i class="fa fa-save"></i>  Guardar</button>
                    <a href="{{ url('publicacion') }}" class="btn btn-danger pull-right"><i class="fa fa-undo"></i>  Regresar</a>
                </div> 
            </div>  
        </div>
       </form>
@endsection