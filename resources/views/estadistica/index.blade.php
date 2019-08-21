@extends('themes/lte/layaout')

<style type="text/css">
   .estadistica-list a{
    font-weight: bold;
    text-transform: uppercase;
   }

   .estadistica-list .list-group-item:hover { 
    background-color: cyan !important;
  }

  .estadistica-list a:nth-child(odd){
    background-color: rgba(192, 239, 251, 0.5);
  }

  .estadistica-list a:nth-child(even){
    background-color: rgba(193, 199, 201 , 0.5);
  }

  .estadistica-list strong{
    color: crimson;
  }

   .estadistica-list .last-item{
     /* background-color: #8DDCD1 !important;*/
      color: darkblue;
      font-weight: bold;
   }

</style>

@section('tituloForm')
   <h2 class="text-center"><u>Estadísticas</u></h2>
   <h3 class="text-center">Reportes disponibles</h3>
   
   <a href="{{ url('menu') }}" class="btn btn-primary pull-right"><i class="fa fa-undo"></i>  Regresar</a>
@endsection

@section('contenedor')
       <div class='content-fluid'>
        <div class="list-group estadistica-list">
            <a href="/estadistica/listadoprofesores" class="list-group-item list-group-item-action">
              Porcentaje de participantes según su rol
             </a>
            <a href="/estadistica/comparativa_usuarios_rol" class="list-group-item list-group-item-action">
              Cantidad de participantes según su rol y año <strong> (COMPARATIVA)</strong>
            </a>
            <a href="/estadistica/listadotema" class="list-group-item list-group-item-action">  Cantidad de temas por dominios</a>
            <a href="/estadistica/comparativa_dominios_temas" class="list-group-item list-group-item-action">Cantidad de temas por dominio y año<strong> (COMPARATIVA)</strong></a>
            <a href="/estadistica/listadofacultades" class="list-group-item list-group-item-action">  Cantidad de temas por facultades</a>
             <a href="/estadistica/comparativa_facultades_temas" class="list-group-item list-group-item-action">Cantidad de temas por facultades y año<strong> (COMPARATIVA)</strong>
            <a href="/estadistica/top10" class="list-group-item list-group-item-action"> Top 10 de los mejores profesores puntuados</a>
            <a href="/estadistica/rechazadovscalificados" class="list-group-item list-group-item-action"> Cantidad de temas rechazados vs calificados</a>
            <a href="/estadistica/rechazadosvscalificados_comparativa" class="list-group-item list-group-item-action"> Cantidad de temas rechazados vs calificados y año <strong> (COMPARATIVA)</strong></a>
            <a href="/estadistica/dashboard_comparativo" class="list-group-item list-group-item-action last-item"> DASHBOARD</a>
              <br><br>
        </div>

       </div>
       
@endsection