@extends('themes/lte/layaout')

@section('tituloForm')
   <h3>Recuperar contraseña por correo electrónico</h3>
   <a href="{{ url('asignaciones') }}" class="btn btn-primary pull-right"><i class="fa fa-undo"></i> Regresar</a>

@endsection

@section('contenedor')
@if($errors->any())
<div class="alert alert-primary"><h4>{{$errors->first()}}</h4></div>
@endif
@if (session()->has('flash'))
<div class="alert alert-primary alert-dismissible"> {{ session('flash')}}</div>
@endif
<div class="box box-primary">
    <div class="col-md-4 col-md-offset-4">
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-header with-border">
                    
        </div>
        <form role="form" method="POST" action="/usuarios/enviarClave" class="form">
         {{ csrf_field() }}
         <div class="form-group row">
            <label for="inputEmail3" class="col-sm-5 col-form-label">Correo</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
            </div>
         </div>
          
          
          <div class="box-footer">
              <button type="submit" class="btn btn-primary pull-left"><i class="fa fa-envelope"></i>  Enviar clave</button>
          </div>
        </form>
      </div>
</div>
@endsection