  <!-- Animation -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">

@extends('themes/lte/layaout')

@section('titulo')
   
@endsection

@section('contenedor')

<div class="box-body no-padding">
        @csrf
        <div class="table-responsive">
            <table class="table table-sm">
                <tr>
                    <td><a href="{{ url('usuarios') }}"><img src="/img/new_menu_icons/Usuariosfix.png" alt="" id="imagen" class='animated bounceIn delay-20s'></a> </td>
                    <td><a href="{{ url('fases') }}"><img src="/img/new_menu_icons/Crogramafix.png" alt="" id="imagen" class='animated bounceIn delay-20s'></a> </td>

                    <!--  <td><a href="{{ url('usuarios') }}"><i class='fas fa-user-circle responsive'></i></a> <label>Usuarios</label></td><td><a href="{{ url('fases') }}"><i class='far fa-calendar-alt responsive'></i></a> <label>Cronograma</label></td>   -->

                </tr>
                <tr>
                    <td><a href="{{ url('dominio') }}"><img src="/img/new_menu_icons/Dominiosfix.png" alt="" id="imagen" class='animated bounceIn delay-20s'></a></td>
                    <td><a href="{{ url('estado') }}"><img src="/img/new_menu_icons/Estadosfix.png" alt="" id="imagen" class='animated bounceIn delay-20s'></a></td>

                   <!--  <td><a href="{{ url('dominio') }}"><i class='fas fa-clipboard-list responsive'></i></a> <label>Dominios</label></td><td><a href="{{ url('estado') }}"><i class='fas fa-check-double responsive'></i></a> <label>Estados</label></td>  -->
                </tr>
            
                <tr>
                    <td><a href="{{ url('rol') }}"><img src="/img/new_menu_icons/Rolesfix.png" alt="" id="imagen" class='animated bounceIn delay-20s'></a> </td>
                    <td><a href="{{ url('facultad') }}"><img src="/img/new_menu_icons/Facultadesfix.png" alt="" id="imagen" class='animated bounceIn delay-20s'></a></td>

                    <!-- <td><a href="{{ url('rol') }}"><i class='fas fa-users-cog responsive'></i></a> <label>Roles</label></td>
                    <td><a href="{{ url('facultad') }}"><i class='fas fa-school responsive'></i></a> <label>Facultades</label></td>     -->


                </tr>

                </tr>
                <tr>
                    <td><a href="{{ url('carrera') }}"><img src="/img/new_menu_icons/Carrerasfix.png" alt="" id="imagen" class='animated bounceIn delay-20s'></a></td>
                    <td><a href="{{ url('menu') }}"><img src="/img/new_menu_icons/Regresarfix.png" alt="" id="imagen" class='animated bounceIn delay-20s'></a></td>     

                    <!-- <td><a href="{{ url('carrera') }}"><i class='far fa-building responsive'></i></a> <label>Carreras</label></td>
                    <td><a href="{{ url('menu') }}"><i class='fas fa-undo-alt responsive'></i></a> <label>Regresar</label></td> -->
                    
                </tr>

                <tr>
                     
                </tr>
            </table>
        </div>
</div>

@endsection