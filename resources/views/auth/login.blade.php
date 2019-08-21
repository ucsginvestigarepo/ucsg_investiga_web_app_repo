@extends('themes/lte/layaout')

@section('tituloForm')
   <h3></h3>
@endsection

@section('contenedor')
@if (session()->has('flash'))
<div class="alert alert-primary"> {{ session('flash')}}</div>
@endif
<div class="box box-primary">
    <div class="col-md-3 col-md-offset-4">
        <div class="box-header with-border">
          <p class="text-center"><img src="{{asset('img/logoucsg.png')}}" alt=""></p>
          
        </div>
        <!-- /.box-header -->
        <!-- form start -->
       
        <form role="form" method="POST" action="{{ route('login')}}" class="form">
         {{ csrf_field() }}
        
          <div class="box-body"  >
            <div class="form-group {{ $errors->has('email') ? 'has-error': ''}}">
            <span class="glyphicon glyphicon-envelope"></span>
            <label for="exampleInputEmail1">Dirección email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email" value="{{ old('email')}}">
            {!! $errors->first('email','<span class="help-block">:message</span>') !!}
            </div>
            <div class="form-group {{ $errors->has('password') ? 'has-error': ''}}">
              <span class="glyphicon glyphicon-lock"></span>
              <label for="exampleInputPassword1" >Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
            {!! $errors->first('password','<span class="help-block">:message</span>') !!}
            </div>
            <a href="{{ url('recuperarclave') }}">Recupere su clave</a><br>
          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-success"><i class="fa fa-user"></i> Login</button>
            <a href="{{ url('nuevo') }}" class="btn btn-primary pull-leff"><i class="fa fa-user-plus"></i> Registrar nuevo</a>
          </div>
        </form>
      </div>
</div>
@endsection
