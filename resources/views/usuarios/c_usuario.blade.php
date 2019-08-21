@extends('themes/lte/layaout')

@section('tituloForm')
   <h2 class="text-center"><u>Mantemiento/Usuarios</u></h2>
   <h3 class="text-center">Registro de usuario nuevo</h3>
@endsection

<style type="text/css">
  .asterisco{
    font-size: 1.5em;
  }

</style>

@section('contenedor')
@if($errors->any())
<div class="alert alert-danger"><h4>{{$errors->first()}}</h4></div>
@endif
@if (session()->has('flash'))
<div class="alert alert-primary"> {{ session('flash')}}</div>
@endif
<div class="box box-primary">
    <div class="col-md-4 col-md-offset-4">
        <div class="box-header with-border">
                    
        </div>
        <!-- /.box-header -->
        <!-- form start -->
       
        <form role="form" method="POST" action="/usuarios/guardar">
         {{ csrf_field() }}
         <div class="form-group row">
             
             <br>
            <label class="col-sm-1 col-form-label text-danger asterisco">*</label>
            <label for="inputEmail3" class="col-sm-2 col-form-label">Cédula</label>
            <div class="col-sm-9">
              <input type="text" maxlength="10" class="form-control" id="cedula" placeholder="Cédula" name="cedula" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-1 col-form-label text-danger asterisco">*</label>
            <label for="inputEmail3" class="col-sm-2 col-form-label">Nombres</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="nombre" placeholder="Nombres completos" name="nombre" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-1 col-form-label text-danger asterisco">*</label>
            <label for="inputEmail3" class="col-sm-2 col-form-label">Dirección</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="direccion" placeholder="Dirección" name="direccion" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-1 col-form-label text-danger asterisco">*</label>
            <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-9">
              <input type="email" class="form-control" id="email" placeholder="Email" name="email"  required>
            </div>
          </div>
         
          <div class="form-group row">
            <label class="col-sm-1 col-form-label text-danger asterisco">*</label>
            <label for="inputEmail3" class="col-sm-2 col-form-label">Telefono</label>
            <div class="col-sm-9">
              <input type="tel" class="form-control" id="telefono" placeholder="Telefono" name="telefono" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-1 col-form-label text-danger asterisco">*</label>
            <label for="inputEmail3" class="col-sm-2 col-form-label">Celular</label>
            <div class="col-sm-9">
              <input type="tel" class="form-control" id="celular" placeholder="Celular" name="celular" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-1 col-form-label text-danger asterisco">*</label>
            <label for="inputEmail3" class="col-sm-2 col-form-label">Rol</label>
            <div class="col-sm-9">
                <select name="rol" id="rol" class="form-control" required>
                    @foreach ($rol as $item)
                        <option value={{ $item['id']}}>{{ $item['nombre']}}</option>
                    @endforeach
                </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-1 col-form-label text-danger asterisco">*</label>
            <label for="inputEmail3" class="col-sm-2 col-form-label">Facultad</label>
            <div class="col-sm-9">
                <select name="facultad" id="facultad" class="form-control" required>
                  <option value=0>Selecciona</option>  
                  @foreach ($facultad as $item)
                        <option value={{ $item['id']}}>{{ $item['nombre']}}</option>
                    @endforeach
                </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-1 col-form-label text-danger asterisco">*</label>
            <label for="inputEmail3" class="col-sm-2 col-form-label">Carrera</label>
            <div class="col-sm-9">
                <select name="carrera" id="carrera" class="form-control" required>
                    <option value=0>Selecciona</option> 
                </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-1 col-form-label text-danger asterisco">*</label>
            <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-9">
              <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password" required>
            </div>
          </div>
          
          <!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i>  Registrar</button>
            <a href="{{ url('usuarios') }}" class="btn btn-danger pull-left"><i class="fa fa-undo"></i>  Regresar</a>
            
          </div>
        </form>
      </div>
</div>
@endsection