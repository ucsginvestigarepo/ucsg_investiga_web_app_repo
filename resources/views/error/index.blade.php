@extends('themes/lte/layaout')

@section('tituloForm')
   <h3>Acceso no autorizado</h3>
   <a href="{{ url('menu') }}" class="btn btn-primary pull-right"><i class="fa fa-undo"></i>  Regresar</a>
@endsection

@section('contenedor')
       <div class='content-fluid'>
            <div class="desplazamiento">
                    <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-warning"></i> Atención!</h4>
                            <p>Estimado usuario, si requiere acceder a esta sección por favor solicite acceso al administrador del sistema, muchas gracias por su comprensión.</p>
                    </div>
            </div>
        </div>
@endsection