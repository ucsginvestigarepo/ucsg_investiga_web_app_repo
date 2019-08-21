 <!-- Font Awesome -->
  <!-- <link rel="stylesheet" href="{{asset('assets/lte/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"> -->

  <!-- Animation -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">

@extends('themes/lte/layaout')

@section('titulo')
   
@endsection

@section('contenedor')

<!-- <style type="text/css">
    .fas, .far{
        margin-left: 0.5em;
        font-size: 4em;
        color: darkblue;
    }
    label{
        font-size: 1.5em;
        margin-left: 0.5em;
    }

    .callout{
      background-color: darkblue !important;
      border: 1em black;
      border-radius: 0.5em;
    }

    .callout h4, .callout p {
      color: white;
    }

    img{
      max-width: 100%;
    }
</style> -->

<div class="box-body no-padding">
        @csrf
        <div style="max-width:100%;height: auto;">
        @if (auth()->user()->idRol==6)
            <!--<div align="center"><img src="{{asset('img/logoucsg.png')}}" alt=""></div>-->
            <!-- <div class="callout callout-info">
                <h4>Bienvenidos a nuestro sistema UCSG-INVESTIG@</h4>
                <p>Nuestro concurso Investig@ creado con el ánimo de promover la investigación científica, le otorga a nuestros docentes el poder presentar sus mejores trabajos en colaboración a la Universidad.</p>
            </div> -->
            <div class="alert alert-primary alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-warning"></i> Atención!</h4>
                    <p>Estimado usuario, por el momento no tendra acceso a las funciones hasta que el administrador del sistema le otorge un rol de usuario. Se le dara aviso a la brevedad posible.</p>
            </div>
        @else
            <!--<div align="center"><img src="{{asset('img/logoucsg.png')}}" alt=""></div>-->

            <div align="text-left"><img src="{{asset('img/ucsg-investiga-medium.png')}}" class="animated fadeInLeft delay-20s" style="margin-left: 3%;"  alt=""></div>
 
            <div class="callout callout-primary" style="margin-top: 0.5em;">
                <h4 class="animated bounce delay-20s" style="color: lightgreen;margin-top: 1%;">Bienvenidos a nuestro sistema UCSG-INVESTIGA</h4>
                <p>Concurso Ucsg Investiga que promueve la investigación científica.</p>
            </div>
        @endif
        <h4><strong>FASE:</strong> {{$fechas["nombre"]}}</h4>
        Fecha desde: {{$fechas["fechadesde"]}}<br>
        Fecha hasta: {{$fechas["fechahasta"]}}
        <div class="table-responsive">
            <table class="table table-sm">
                <tr>
                    @if (auth()->user()->idRol==1)
                         <td><a href="{{ url('submenu') }}"><img src="/img/new_menu_icons/Mantenimientofix.png" alt=""  id="imagen" style="margin-left:0.5em;" class='responsive animated bounceIn delay-20s'></a> </td>

                      <!--  <td><a <head></head>ref="{{ url('submenu') }}"><i class='fas fa-briefcase'></i></a> <label>Mantenimiento</label></td> 
 					            -->
                         
                    @else
                         <td><img src="/img/new_menu_icons/No_acceso/Mantenimientofix.png" alt="" id="imagen" style="margin-left:0.5em;" class='responsive '> </td>
                    @endif
                    @if (auth()->user()->idRol==5)
                        <td><a href="{{ url('publicacion') }}"><img src="/img/new_menu_icons/Publicacionfix.png" alt="" id="imagen" class='responsive animated bounceIn delay-20s'></a> </td>

                        <!--  <td><a href="{{ url('publicacion') }}"><i class='far fa-file-alt'></i></a> <label>Publicación</label></td>  -->
                    @else
                         <td><img src="/img/new_menu_icons/No_acceso/Publicacionfix.png" alt="" id="imagen" class='responsive'> </td>
                    @endif
                </tr>
                <tr>
                    @if (auth()->user()->idRol==3)
                         <td><a href="{{ url('gestion') }}"><img src="/img/new_menu_icons/gestion_propuestasfix.png" alt="" id="imagen" style="margin-left:1em;" class='responsive animated bounceIn delay-20s'></a> </td>

                         <!--  <td><a href="{{ url('gestion') }}"><i class='fas fa-check-square'></i></a> <label>Gestión de propuestas</label></td> -->
                    @else
                         <td><img src="/img/new_menu_icons/No_acceso/gestion_propuestasfix.png" alt="" id="imagen" style="margin-left:1em;"  class='responsive'> </td>
                    @endif

                    @if (auth()->user()->idRol==2)
                         <td><a href="{{ url('calificacion') }}"><img src="/img/new_menu_icons/Calificacion_propuestafix.png" alt="" id="imagen" style="margin-left:1em;" class='responsive animated bounceIn delay-20s'></a> </td>

                        <!--  <td><a href="{{ url('gestion') }}"><i class='far fa-edit'></i></a> <label>Calificación de propuestas</label></td> -->
                    @else
                         <td><img src="/img/new_menu_icons/No_acceso/Calificacion_propuestafix.png" alt="" id="imagen" style="margin-left:1em;" class='responsive'> </td>
                    @endif
                </tr>
            
                <tr>
                    @if (auth()->user()->idRol==1)
                        <td><a href="{{ url('asignaciones') }}"><img src="/img/new_menu_icons/Asignacionesfix.png" alt="" id="imagen"  class='responsive animated bounceIn delay-20s'></a> </td>

                         <!-- <td><a href="{{ url('asignaciones') }}"><i class='  fas fa-list-alt'></i></a> <label>Asignaciones</label></td>
 						             -->

                    @else
                         <td><img src="/img/new_menu_icons/No_acceso/Asignacionesfix.png" alt="" id="imagen" class='responsive'> </td>
                    @endif
                    
                    @if (auth()->user()->idRol==1)
                         <td><a href="{{ url('estadistica') }}"><img src="/img/new_menu_icons/Estadisticasfix.png" alt="" id="imagen" class='responsive animated bounceIn delay-20s'></a> </td>

                          <!-- <td><a href="{{ url('estadistica') }}"><i class='fas fa-chart-pie'></i></a> <label>Estadisticas</label></td> -->
                    @else
                         <td><img src="/img/new_menu_icons/No_acceso/Estadisticasfix.png" alt="" id="imagen" class='responsive'> </td>
                    @endif
                </tr>  
                <tr>
                    @if (auth()->user()->idRol<>6)
                        <td><a href="{{ url('ranking') }}"><img src="/img/new_menu_icons/Rankingsfix.png" alt="" id="imagen" class='responsive animated bounceIn delay-20s'></a> </td>

                        <!-- <td><a href="{{ url('ranking') }}"><i class='fas fa-list-ol'></i></a> <label>Rankings</label></td> -->

                    @else
                        <td><img src="/img/new_menu_icons/No_acceso/Rankingsfix.png" alt="" id="imagen" class='responsive'> </td>
                    @endif

                     @if (auth()->user()->idRol<>6)
                        <td><a href="{{ url('ganadores') }}"><img src="/img/new_menu_icons/Ganadoresfix.png" alt="" id="imagen" class='responsive animated bounceIn delay-20s'></a> </td>

                        <!-- <td><a href="{{ url('ganador') }}"><i class='fas fa-trophy'></i></a> <label>Ganadores</label></td> -->

                    @else
                        <td><img src="/img/new_menu_icons/No_acceso/Ganadoresfix.png" alt="" id="imagen" class='responsive'> </td>
                    @endif
                </tr>       
                               
            </table>
        </div>
        </div>
</div>

@endsection