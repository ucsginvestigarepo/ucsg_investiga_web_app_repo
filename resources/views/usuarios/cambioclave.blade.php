@extends('themes/lte/layaout')

@section('tituloForm')
   <h3>Cambiar clave</h3>
   <a href="{{ url('menu') }}" class="btn btn-primary pull-right"><i class="fa fa-undo"></i> Regresar</a>

@endsection

@section('contenedor')
@if($errors->any())
<div class="alert alert-warning"><h4>{{$errors->first()}}</h4></div>
@endif
@if (session()->has('flash'))
<div class="alert alert-primary"> {{ session('flash')}}</div>
@endif
<div class="box box-primary">
    <div class="col-md-4 col-md-offset-4">
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-header with-border">
                    
        </div>
        <form role="form" method="POST" action="/usuarios/actualizarclave">
         {{ csrf_field() }}
         <div class="form-group row">
            <label for="inputEmail3" class="col-sm-5 col-form-label">Password anterior</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="clave" placeholder="Clave anterior" name="claveant" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-4 col-form-label">Password nuevo</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="clave" placeholder="Clave nueva" name="clavenew" required>
            </div>
          </div>
          <div class="box-footer">
              <button type="submit" class="btn btn-primary pull-left"><i class="fa fa-save"></i>  Actualizar</button>
          </div>
        </form>
      </div>
</div>
@endsection