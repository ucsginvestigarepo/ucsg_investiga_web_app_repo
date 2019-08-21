@extends('themes/lte/layaout')

@section('tituloForm')
   <h3 class="text-center">Registro de usuario nuevo</h3>
@endsection

<style type="text/css">
  .asterisco{
    font-size: 1.5em;
  }

</style>

@section('contenedor')
@if (session()->has('flash'))
<div class="alert alert-primary"> {{ session('flash')}}</div>
@endif

@if($errors->any())
<div class="alert alert-primary"><h4>{{$errors->first()}}</h4></div>
@endif

<div class="box box-primary">
    <div class="col-md-4 col-md-offset-4">
        <div class="box-header with-border">
                    
        </div>
        <!-- /.box-header -->
        <!-- form start -->
       
        <form role="form" method="POST" action="{{ route('registrar')}}" enctype="multipart/form-data" accept-charset="UTF-8">
         {{ csrf_field() }}
         <div class="form-group row">
             
             <br>
             <label class="col-sm-1 col-form-label text-danger asterisco">*</label>
            <label for="inputEmail3" class="col-sm-2 col-form-label">Cédula</label>
            <div class="col-sm-9">
              <input type="text"  class="form-control" id="cedula" placeholder="Cedula" name="cedula" required>
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
              <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-1 col-form-label text-danger asterisco">*</label>
            <label for="inputEmail3" class="col-sm-2 col-form-label">Teléfono</label>
            <div class="col-sm-9">
              <input type="tel" class="form-control" id="teléfono" placeholder="Telefono" name="telefono"required>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-1 col-form-label text-danger asterisco">*</label>
            <label for="inputEmail3" class="col-sm-2 col-form-label">Celular</label>
            <div class="col-sm-9">
              <input type="tel" class="form-control" id="celular" placeholder="Celular" name="celular" >
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
                <select name="carrera" id="carrera" class="form-control" placeholder='Selecciona' required>
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
          <div class="form-group row">
            <label class="col-sm-1 col-form-label text-danger asterisco">*</label>
            <label for="inputPassword3" class="col-sm-2 col-form-label">Confirmar Password</label>
            <div class="col-sm-9">
              <input type="password" class="form-control" id="inputPassword3" placeholder="Repetir Password" name="password2" required>
            </div>
          </div>
          <div class="form-group">
              <label for="">Por favor seleccione solo archivos jpg con tamaño tipo pasaporte para su foto de perfil.</label>
              <input type="file" class="form-control" name="file" id="file" accept="image/*" >
         </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i> Registrar</button>
            <a href="{{ url('/') }}" class="btn btn-danger pull-left"><i class="fa fa-undo"></i> Regresar</a>
            
          </div>
        </form>
      </div>
</div>
@endsection