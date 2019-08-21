@extends('themes/lte/layaout')

@section('tituloForm')
   <h2 class="text-center"><u>Mantemiento/Usuarios</u></h2>
   <h3 class="text-center">Editar Usuario</h3>
@endsection

<style type="text/css">
  .asterisco{
    font-size: 1.8em;
  }

  .blank{
    font-size: 1.8em;
    color: white;
  }

  label{
    padding: 0.5em;
  }

  .msg_edit_usr{
     font-size: 1.3em;
  }

   p{
    font-size: 1.2em;
    font-weight: bold;
  }

</style>

@section('contenedor')
@if($errors->any())
<div class="alert alert-info"><h4>{{$errors->first()}}</h4></div>
@endif
    <div class='content-fluid'>
     <div class="col-md-4 col-md-offset-4">
       <form method="post" action="/usuarios/actualizar" >
            @csrf
            <div class="form-group row">
            
            <div class="form-group row">
              <label class="col-sm-1 col-form-label blank">.</label>
                <label for="inputEmail3" class="col-sm-2 col-form-label">Id</label>
                    <div class="col-sm-9">
                        <input type="text" maxlength="13" class="form-control" id="id" value="{{$datos->id}}" placeholder="Id" name="id" readonly>
                    </div>
            </div>
            <div  class="form-group row">
              <label class="col-sm-1 col-form-label text-danger asterisco">*</label>
                <label for="inputEmail3" class="col-sm-2 col-form-label">Cédula</label>
                    <div class="col-sm-9">
                        <input type="text" maxlength="10" class="form-control" id="cedula" value="{{$datos->cedula}}" placeholder="Cedula" name="cedula" required >
                    </div>
            </div>
            
            <div class="form-group row">
              <label class="col-sm-1 col-form-label text-danger asterisco">*</label>
               <label for="inputEmail3" class="col-sm-2 col-form-label">Nombres</label>
               <div class="col-sm-9">
                    <input type="text" class="form-control" id="nombre" placeholder="Nombres completos"  value="{{$datos->name}}" name="nombre" required>
               </div>
             </div>
             <div class="form-group row">
              <label class="col-sm-1 col-form-label text-danger asterisco">*</label>
               <label for="inputEmail3" class="col-sm-2 col-form-label">Dirección</label>
               <div class="col-sm-9">
                 <input type="text" class="form-control" id="direccion" placeholder="Dirección"  value="{{$datos->direccion}}" name="direccion" required>
               </div>
             </div>
             <div class="form-group row">
              <label class="col-sm-1 col-form-label text-danger asterisco">*</label>
               <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
               <div class="col-sm-9">
                 <input type="email" class="form-control" id="email" placeholder="Email" value="{{$datos->email}}" name="email"   required>
              </div>
             </div>
             
             <div class="form-group row">
              <label class="col-sm-1 col-form-label text-danger asterisco">*</label>
               <label for="inputEmail3" class="col-sm-2 col-form-label">Teléfono</label>
               <div class="col-sm-9">
                 <input type="tel" class="form-control" id="telefono" placeholder="Telefono" value="{{$datos->telefono}}" name="telefono" required>
               </div>
             </div>
             <div class="form-group row">
              <label class="col-sm-1 col-form-label text-danger asterisco">*</label>
              <label for="inputEmail3" class="col-sm-2 col-form-label">Celular</label>
              <div class="col-sm-9">
                <input type="tel" class="form-control" id="celular" placeholder="Celular" value="{{$datos->celular}}" name="celular" required>
              </div>
            </div>
             <div class="form-group row">
              <label class="col-sm-1 col-form-label text-danger asterisco">*</label>
               <label for="inputEmail3" class="col-sm-2 col-form-label">Rol</label>
               <div class="col-sm-9">
                   <select name="rol" id="rol" class="form-control" required>
                       @foreach ($rol as $item)
                            @if ($item['id']==$datos->idRol)
                                <option value={{ $item['id']}} selected>{{ $item['nombre']}}</option>
                            @else
                                <option value={{ $item['id']}}>{{ $item['nombre']}}</option>
                            @endif
                           
                       @endforeach
                   </select>
               </div>
             </div>
             <div class="form-group row">
              <label class="col-sm-1 col-form-label text-danger asterisco">*</label>
               <label for="inputEmail3" class="col-sm-2 col-form-label">Facultad</label>
               <div class="col-sm-9">
                   <select name="facultad" id="facultad" class="form-control" required>
                       @foreach ($facultad as $item)
                            @if ($item['id']==$datos->idFacultad)
                                <option value={{ $item['id']}} selected>{{ $item['nombre']}}</option>
                            @else
                                <option value={{ $item['id']}}>{{ $item['nombre']}}</option>
                            @endif
                           
                       @endforeach
                   </select>
               </div>
             </div>
             <div class="form-group row">
              <label class="col-sm-1 col-form-label text-danger asterisco">*</label>
               <label for="inputEmail3" class="col-sm-2 col-form-label">Carrera</label>
               <div class="col-sm-9">
                   <select name="carrera" id="carrera" class="form-control" required>
                       @foreach ($carrera as $item)
                            @if  ($item['id']==$datos->idCarrera)
                                <option value={{ $item['id']}} selected>{{ $item['nombre']}}</option>
                            @else
                                <option value={{ $item['id']}}>{{ $item['nombre']}}</option>
                            @endif
                           
                       @endforeach
                   </select>
               </div>
             </div>
             <div class="form-group row">
              <label class="col-sm-1 col-form-label  blank">.</label>
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Estado</label>
                    <div class="col-sm-9">
                        <select name="estado" id="estado" class="form-control" disabled>
                            @foreach ($estado as $item)
                                 @if  ($item['id']==$datos->idEstado)
                                     <option value={{ $item['id']}} selected>{{ $item['nombre']}}</option>
                                 @else
                                     <option value={{ $item['id']}}>{{ $item['nombre']}}</option>
                                 @endif
                                
                            @endforeach
                        </select>
                    </div>
             </div>
             <div class="form-group row">
               <label class="text-justify msg_edit_usr" max-witdh>En la edición de un usuario no se puede actualizar el password, solo debe hacerlo el mismo usuario, por temas de seguridad.</label><br><br>


               <label class="col-sm-1 col-form-label  blank">.</label>
               <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
               <div class="col-sm-9">
                 <input type="password" class="form-control" id="inputPassword3" value="{{$datos->password}}" placeholder="Password" name="password" text-center readonly>
               </div>
             </div>
             
             <!-- /.box-body -->
   
             <div class="box-footer">
               <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i>  Actualizar</button>
               <a href="{{ url('usuarios') }}" class="btn btn-danger pull-left"><i class="fa fa-undo"></i>  Regresar</a>
               
             </div>
            </div>
        </form>
    </div>
    </div>
@endsection