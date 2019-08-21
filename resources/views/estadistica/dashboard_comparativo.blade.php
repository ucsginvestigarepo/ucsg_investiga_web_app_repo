@extends('themes/lte/layaout')

<style type="text/css">
  .Azul_campeon{
    color: darkblue !important;
  }
</style>

@section('tituloForm')
   <div class="headerEstadisticas">
       <h2 class="text-center"><u>Estadísticas</u></h2>
     <h3  class="text-center">Dashboard 
      <?php  
       if(isset($_GET['anios']))
        echo ' - ' .  '<strong class="Azul_campeon">'.$_GET['anios']. '</strong>';
       else
        echo ' - <strong class="Azul_campeon">2019</strong>'
      ?>
      </h3>
     
     <a href="{{ url('estadistica') }}" class="btn btn-primary pull-right"><i class="fa fa-undo"></i> Regresar</a>
   </div>
@endsection

<style type="text/css">

  .lblControles{
    position: absolute;
    float: right;
    margin-top:5% !important;
    right: 3%;
    text-align: justify;
    float: right;
    text-decoration: underline;

  }
  #Controles_anios_dash{
    width: 10%;
    max-width: 10%;
    position: absolute;
    float: right;
    margin-top:6% !important;
    right: 2%;
    border: darkblue 0.25em solid;
    border-radius: 0.5em;
    padding: 1em;
    text-align: justify;
  }

  #cantidad_usuarios_rol, #cantidad_temas_dominios, #cantidad_temas_facultades{
    width: 40%;
    max-width: 40%;
    height: 350px;
    margin: 0 auto;
    margin-left: 0.5em;
    float: left;
  }

  #top_10_profesores{
    width: 50%;
    max-width: 50%;
    height: 350px;
    margin: 0 auto;
    margin-left: 0.5em;
    float: left;
  }

  #cantidad_temas_rechzados_vs_calificados{
    width: 40%;
    height: 350px;
    margin: 0 auto;
    float: left;
  }

</style>

  <!-- <style type="text/css"> 
        @media screen and ( min-width:300px ) and ( max-width: 1200px )
          { 
            #cantidad_usuarios_rol, #cantidad_temas_dominios, #cantidad_temas_facultades{  
              display: block;
              width: 100%;
          } } 
       
    </style> -->
<style type="text/css">
    
    @media screen and (max-width: 1280px) {
         #Controles_anios_dash{
           width: 100%;
           max-width: 100%;
           display: inline-block;
           position: relative;
         }

         #Controles_anios_dash, .lblControles{
          display: table-cell;
          vertical-align: middle;
          text-align: center;
          border: 0;
          padding: 1em;
          margin: 0 auto;

         }

         #cantidad_usuarios_rol, #cantidad_temas_dominios, #cantidad_temas_facultades,#top_10_profesores,#cantidad_temas_rechzados_vs_calificados{
          width: 100%;
          max-width: 100%;
          display: inline-block;
          height: 350px;
          margin: 0 auto;
        }
    }
</style>

@section('contenedor')
       
   <!--  <div id="listado_participantes" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div> -->
   <div class="desplazamiento">
      
    <div id="Controles_anios_dash" style="margin: 0 auto">
      <!-- <label class="lblControles">Años</label><br><br> -->
      <form action="#" method="get">
        <fieldset>
          <legend>Años:</legend>

           <input type="radio" id="rd_2017" name="anios" value="2017"> <strong>2017</strong><br>
        <input type="radio" id="rd_2018" name="anios" value="2018"> <strong>2018</strong><br>
        <input type="radio" id="rd_2019" name="anios" value="2019"> <strong>2019</strong><br>
        <input type="submit" id="btn-radio" class="btn btn-primary text-center" name="buscar" value="Buscar">
        </fieldset>
       
      </form>
    </div>

    <div style="border-top:1px solid #CDCDCD;margin:10px;padding:0;clear:both;"></div><br>
      <div id="cantidad_usuarios_rol" style="min-width: 500px; height: 400px; max-width: 100%; margin: 0 auto"></div>
      <div id="cantidad_temas_dominios" style="min-width: 500px; height: 400px; max-width: 100%; margin: 0 auto"></div>
    <div style="border-top:1px solid #CDCDCD;margin:10px;padding:0;clear:both;"></div><br>
      <div id="cantidad_temas_facultades" style="min-width: 500px; height: 400px; max-width: 100%; margin: 0 auto"></div>
      <div id="top_10_profesores" style="min-width: 500px; height: 400px; max-width: 100%; margin: 0 auto"></div>
    <div style="border-top:1px solid #CDCDCD;margin:10px;padding:0;clear:both;"></div><br>
      <div id="cantidad_temas_rechzados_vs_calificados" style="min-width: 500px; height: 400px; max-width: 100%; margin: 0 auto"></div>
    <div style="border-top:1px solid #CDCDCD;margin:10px;padding:0;clear:both;"></div><br>
    
   </div>
       
@endsection

@section('graficas')

        <script type="text/javascript">
            Highcharts.chart('cantidad_usuarios_rol', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Participantes del concurso Investiga'
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                            style: {
                                color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                            }
                        }
                    }
                },

                 credits: {
                     enabled: false
                },
                series: [{
                    name: 'Usuarios',
                    colorByPoint: true,
                   
                    data: [
                        
                            @php

                              if(isset($_GET['buscar']) == 'Buscar' && $_GET['anios'] == '2017'){

                                $datos_users_2017=json_decode(json_encode($datos_user_rol_dash_anio_2017), true);

                                if(count($datos_users_2017)<>0){
                                  $cont=count($datos_users_2017);
                                 //print_r($datos);
                                 for($i=0;$i<=$cont-1;$i++) {
                                      
                                          echo '{';
                                          echo 'name:\''.$datos_users_2017[$i]['nombre'].'\',';
                                          echo 'y:'.$datos_users_2017[$i]['cantidad'];
                                          echo '},';
                                  }
                                
                                }else{

                                   echo '{';
                                          echo 'name:\''.'No hay datos disponibles'.'\',';
                                          echo 'y:'.'0';
                                          echo '},';
                                 } 
                                  
                              }elseif(isset($_GET['buscar']) == 'Buscar' && $_GET['anios'] == '2018'){

                                $datos_users_2018=json_decode(json_encode($datos_user_rol_dash_anio_2018), true);

                                if(count($datos_users_2018)<>0){
                                   $cont=count($datos_users_2018);
                                 //print_r($datos);
                                 for($i=0;$i<=$cont-1;$i++) {
                                      
                                          echo '{';
                                          echo 'name:\''.$datos_users_2018[$i]['nombre'].'\',';
                                          echo 'y:'.$datos_users_2018[$i]['cantidad'];
                                          echo '},';
                                
                               }

                               }else{
                                   echo '{';
                                          echo 'name:\''.'No hay datos disponibles'.'\',';
                                          echo 'y:'.'0';
                                          echo '},';
                               }  

                              }elseif(isset($_GET['buscar']) == 'Buscar' && $_GET['anios'] == '2019'){

                                $datos_users_2019=json_decode(json_encode($datos_user_rol_dash_anio_2019), true);

                                if(count($datos_users_2019)<>0){
                                   $cont=count($datos_users_2019);
                                 //print_r($datos);
                                 for($i=0;$i<=$cont-1;$i++) {
                                      
                                          echo '{';
                                          echo 'name:\''.$datos_users_2019[$i]['nombre'].'\',';
                                          echo 'y:'.$datos_users_2019[$i]['cantidad'];
                                          echo '},';
                                
                                  }
                                }else{
                                }
                              }else{

                                $datos_users_2019=json_decode(json_encode($datos_user_rol_dash_anio_2019), true);

                                if(count($datos_users_2019)<>0){
                                   $cont=count($datos_users_2019);
                                 //print_r($datos);
                                 for($i=0;$i<=$cont-1;$i++) {

                                          echo '{';
                                           echo 'name:\''.$datos_users_2019[$i]['nombre'].'\','; 
                                          echo 'y:'.$datos_users_2019[$i]['cantidad'];
                                          echo '},';
                                
                                }  
                            }
                          }
                                
                            @endphp   
                                                   
                    ]
                }]
            });

            Highcharts.chart('cantidad_temas_dominios', {
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45
            }
        },
        title: {
            text: 'Cantidad de temas por dominio'
        },
        subtitle: {
            text: 'Proyecto UCSG Investiga'
        },
        plotOptions: {
            pie: {
                innerSize: 100,
                        depth: 45,
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format:'{point.name}: <b>{point.y}</b>',
                            style: {
                                color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                            }
                        }
            }
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'Temas',
            data: [
                    @php
                        if(isset($_GET['buscar']) == 'Buscar' && $_GET['anios'] == '2017'){

                               $datos_temas_2017=json_decode(json_encode($datos_temas_dominio_2017), true);

                                if (count($datos_temas_2017)<>0){
                                  $cont=count($datos_temas_2017);
                                 //print_r($datos);
                                 for($i=0;$i<=$cont-1;$i++) {
                                      
                                          echo '{';
                                          echo 'name:\''.$datos_temas_2017[$i]['nombre'].'\',';
                                          echo 'y:'.$datos_temas_2017[$i]['cantidad'];
                                          echo '},';
                                  }
                                
                                }else{
                                    echo '{';
                                          echo 'name:\''.'No hay datos disponibles'.'\',';
                                          echo 'y:'.'0';
                                          echo '},';
                                }  
                                  
                              }elseif(isset($_GET['buscar']) == 'Buscar' && $_GET['anios'] == '2018'){

                                 $datos_temas_2018=json_decode(json_encode($datos_temas_dominio_2018), true);

                                if (count($datos_temas_2018)<>0){
                                  $cont=count($datos_temas_2018);
                                 //print_r($datos);
                                 for($i=0;$i<=$cont-1;$i++) {
                                      
                                          echo '{';
                                          echo 'name:\''.$datos_temas_2018[$i]['nombre'].'\',';
                                          echo 'y:'.$datos_temas_2018[$i]['cantidad'];
                                          echo '},';
                                  }

                               }else{
                                  echo '{';
                                          echo 'name:\''.'No hay datos disponibles'.'\',';
                                          echo 'y:'.'0';
                                          echo '},';
                               }  

                              }elseif(isset($_GET['buscar']) == 'Buscar' && $_GET['anios'] == '2019'){

                               $datos_temas_2019=json_decode(json_encode($datos_temas_dominio_2019), true);

                                if (count($datos_temas_2019)<>0){
                                  $cont=count($datos_temas_2019);
                                 //print_r($datos);
                                 for($i=0;$i<=$cont-1;$i++) {
                                      
                                          echo '{';
                                          echo 'name:\''.$datos_temas_2019[$i]['nombre'].'\',';
                                          echo 'y:'.$datos_temas_2019[$i]['cantidad'];
                                          echo '},';
                                  }

                                }else{
                                    echo '{';
                                          echo 'name:\''.'No hay datos disponibles'.'\',';
                                          echo 'y:'.'0';
                                          echo '},';
                                }
                              }else{

                                 $datos_temas_2019=json_decode(json_encode($datos_temas_dominio_2019), true);

                                if (count($datos_temas_2019)<>0){
                                  $cont=count($datos_temas_2019);
                                 //print_r($datos);
                                 for($i=0;$i<=$cont-1;$i++) {
                                      
                                          echo '{';
                                          echo 'name:\''.$datos_temas_2019[$i]['nombre'].'\',';
                                          echo 'y:'.$datos_temas_2019[$i]['cantidad'];
                                          echo '},';
                                  } 
                              }else{
                                  
                              }
                            }
                                
                         @endphp   
               
            ]
        }]
    });

     Highcharts.chart('cantidad_temas_facultades', {
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45
            }
        },
        title: {
            text: 'Cantidad de temas por Facultades'
        },
        subtitle: {
            text: 'Proyecto UCSG Investiga'
        },
        plotOptions: {
            pie: {
                innerSize: 100,
                depth: 45,
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                enabled: true,
                format:'{point.name}: <b>{point.y}</b>',
                style: {
                  color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                  }
                }
            }
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'Temas',
            data: [
                    @php
                        if(isset($_GET['buscar']) == 'Buscar' && $_GET['anios'] == '2017'){

                              $datos_facultades_2017=json_decode(json_encode($datos_temas_facultad_2017), true);

                                if (count($datos_facultades_2017)<>0){
                                  $cont=count($datos_facultades_2017);
                                 //print_r($datos);
                                 for($i=0;$i<=$cont-1;$i++) {
                                      
                                          echo '{';
                                          echo 'name:\''.$datos_facultades_2017[$i]['nombre'].'\',';
                                          echo 'y:'.$datos_facultades_2017[$i]['cantidad'];
                                          echo '},';
                                  }
                                
                                }else{
                                     echo '{';
                                          echo 'name:\''.'No hay datos disponibles'.'\',';
                                          echo 'y:'.'0';
                                          echo '},';
                                }  
                                  
                              }elseif(isset($_GET['buscar']) == 'Buscar' && $_GET['anios'] == '2018'){
                                  $datos_facultades_2018=json_decode(json_encode($datos_temas_facultad_2018), true);

                                if (count($datos_facultades_2018)<>0){
                                  $cont=count($datos_facultades_2018);
                                 //print_r($datos);
                                 for($i=0;$i<=$cont-1;$i++) {
                                      
                                          echo '{';
                                          echo 'name:\''.$datos_facultades_2018[$i]['nombre'].'\',';
                                          echo 'y:'.$datos_facultades_2018[$i]['cantidad'];
                                          echo '},';
                                  }

                               }else{
                                     echo '{';
                                          echo 'name:\''.'No hay datos disponibles'.'\',';
                                          echo 'y:'.'0';
                                          echo '},';
                               }  

                              }elseif(isset($_GET['buscar']) == 'Buscar' && $_GET['anios'] == '2019'){

                               $datos_facultades_2019=json_decode(json_encode($datos_temas_facultad_2019), true);

                                if (count($datos_facultades_2019)<>0){
                                  $cont=count($datos_facultades_2019);
                                 //print_r($datos);
                                 for($i=0;$i<=$cont-1;$i++) {
                                      
                                          echo '{';
                                          echo 'name:\''.$datos_facultades_2019[$i]['nombre'].'\',';
                                          echo 'y:'.$datos_facultades_2019[$i]['cantidad'];
                                          echo '},';
                                  }

                                }else{

                                }
                              }else{
                                $datos_facultades_2019=json_decode(json_encode($datos_temas_facultad_2019), true);

                                if (count($datos_facultades_2019)<>0){
                                  $cont=count($datos_facultades_2019);
                                 //print_r($datos);
                                 for($i=0;$i<=$cont-1;$i++) {
                                      
                                          echo '{';
                                          echo 'name:\''.$datos_facultades_2019[$i]['nombre'].'\',';
                                          echo 'y:'.$datos_facultades_2019[$i]['cantidad'];
                                          echo '},';
                                  }
                              }
                            }
                    
                         @endphp   
               
            ]
        }]
    });

      Highcharts.chart('top_10_profesores', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Top 10 de los profesores con los mejores puntajes'
        },
        subtitle: {
            text: 'Proyecto UCSG Investiga'
        },
        xAxis: {
            categories: [
                @php
                  echo '\''."Notas".'\',';
                @endphp    
                
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: '<strong>p u n t a j e</strong>'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.2f} puntos</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0,
                innerSize: 100,
                        depth: 45,
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format:'{series.name}: <b>{point.y:.2f}</b>',
                            style: {
                                color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                            }
                        }
            }
        },
        credits: {
            enabled: false
        },
        series: [
           @php
                    if(isset($_GET['buscar']) == 'Buscar' && $_GET['anios'] == '2017'){

                              $datos_top10_profesores_2017=json_decode(json_encode($datos_top10_profesores_2017), true);

                                if (count($datos_top10_profesores_2017)<>0){
                                  $cont=count($datos_top10_profesores_2017);
                                 //print_r($datos);
                                 for($i=0;$i<=$cont-1;$i++) {
                                      
                                          echo '{';
                                        echo 'name:\''.$datos_top10_profesores_2017[$i]['nombre'].'\',';
                                        echo 'data:['.$datos_top10_profesores_2017[$i]['nota'].']';
                                        echo '},';
                                  }
                                
                                }else{
                                       echo '{';
                                          echo 'name:\''.'No hay datos disponibles'.'\',';
                                          echo 'y:'.'0';
                                          echo '},';
                                }  
                                  
                              }elseif(isset($_GET['buscar']) == 'Buscar' && $_GET['anios'] == '2018'){
                              $datos_top10_profesores_2018=json_decode(json_encode($datos_top10_profesores_2018), true);

                                if (count($datos_top10_profesores_2018)<>0){
                                  $cont=count($datos_top10_profesores_2018);
                                 //print_r($datos);
                                 for($i=0;$i<=$cont-1;$i++) {
                                      
                                           echo '{';
                                        echo 'name:\''.$datos_top10_profesores_2018[$i]['nombre'].'\',';
                                        echo 'data:['.$datos_top10_profesores_2018[$i]['nota'].']';
                                        echo '},';
                                  }

                               }else{
                                     echo '{';
                                          echo 'name:\''.'No hay datos disponibles'.'\',';
                                          echo 'y:'.'0';
                                          echo '},';
                               }  

                              }elseif(isset($_GET['buscar']) == 'Buscar' && $_GET['anios'] == '2019'){

                              $datos_top10_profesores_2019=json_decode(json_encode($datos_top10_profesores_2019), true);

                                if (count($datos_top10_profesores_2019)<>0){
                                  $cont=count($datos_top10_profesores_2019);
                                 //print_r($datos);
                                 for($i=0;$i<=$cont-1;$i++) {
                                      
                                         echo '{';
                                        echo 'name:\''.$datos_top10_profesores_2019[$i]['nombre'].'\',';
                                        echo 'data:['.$datos_top10_profesores_2019[$i]['nota'].']';
                                        echo '},';
                                  }

                                }
                              }else{
                                      $datos_top10_profesores_2019=json_decode(json_encode($datos_top10_profesores_2019), true);

                                if (count($datos_top10_profesores_2019)<>0){
                                  $cont=count($datos_top10_profesores_2019);
                                 //print_r($datos);
                                 for($i=0;$i<=$cont-1;$i++) {
                                      
                                           echo '{';
                                        echo 'name:\''.$datos_top10_profesores_2019[$i]['nombre'].'\',';
                                        echo 'data:['.$datos_top10_profesores_2019[$i]['nota'].']';
                                        echo '},';
                                  }
                              }
                            }
                              
                         @endphp   
        
        ]
    });

      Highcharts.chart('cantidad_temas_rechzados_vs_calificados', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Comparativa entre temas rechazados y calificados'
        },
        subtitle: {
            text: 'Proyecto UCSG Investiga'
        },
        xAxis: {
            categories: [
                  @php
                    echo '\''."Temas".'\',';
                 @endphp      
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: '<strong>c a n t i d a d</strong>'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y} unidades</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0,
                 innerSize: 100,
                        depth: 45,
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format:'{series.name}: <b>{point.y}</b>',
                            style: {
                                color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                            }
                        }
            }
        },
        credits: {
            enabled: false
        },
        series: [
            @php

              if(isset($_GET['buscar']) == 'Buscar' && $_GET['anios'] == '2017'){
                               $datos_rechazados_calificados2017=json_decode(json_encode($datos_rechazados_calificados2017), true);

                                if (count($datos_rechazados_calificados2017)<>0){
                                  $cont=count($datos_rechazados_calificados2017);
                                 //print_r($datos);
                                 for($i=0;$i<=$cont-1;$i++) {
                                      
                                           echo '{';
                                        echo 'name:\''.$datos_rechazados_calificados2017[$i]['nombre'].'\',';
                                        echo 'data:['.$datos_rechazados_calificados2017[$i]['cantidad'].']';
                                        echo '},';
                                  }
                                
                                }else{
                                       echo '{';
                                          echo 'name:\''.'No hay datos disponibles'.'\',';
                                          echo 'y:'.'0';
                                          echo '},';
                                }  
                                  
                              }elseif(isset($_GET['buscar']) == 'Buscar' && $_GET['anios'] == '2018'){
                               $datos_rechazados_calificados2018=json_decode(json_encode($datos_rechazados_calificados2018), true);

                                if (count($datos_rechazados_calificados2018)<>0){
                                  $cont=count($datos_rechazados_calificados2018);
                                 //print_r($datos);
                                 for($i=0;$i<=$cont-1;$i++) {
                                      
                                           echo '{';
                                        echo 'name:\''.$datos_rechazados_calificados2018[$i]['nombre'].'\',';
                                        echo 'data:['.$datos_rechazados_calificados2018[$i]['cantidad'].']';
                                        echo '},';
                                  }

                               }else{
                                     echo '{';
                                          echo 'name:\''.'No hay datos disponibles'.'\',';
                                          echo 'y:'.'0';
                                          echo '},';
                               }  

                              }elseif(isset($_GET['buscar']) == 'Buscar' && $_GET['anios'] == '2019'){

                               $datos_rechazados_calificados2019=json_decode(json_encode($datos_rechazados_calificados2019), true);

                                if (count($datos_rechazados_calificados2019)<>0){
                                  $cont=count($datos_rechazados_calificados2019);
                                 //print_r($datos);
                                 for($i=0;$i<=$cont-1;$i++) {
                                      
                                           echo '{';
                                        echo 'name:\''.$datos_rechazados_calificados2019[$i]['nombre'].'\',';
                                        echo 'data:['.$datos_rechazados_calificados2019[$i]['cantidad'].']';
                                        echo '},';
                                  }

                                }else{
                                       echo '{';
                                          echo 'name:\''.'No hay datos disponibles'.'\',';
                                          echo 'y:'.'0';
                                          echo '},';
                                }
                              }else{
                                      $datos_rechazados_calificados2019=json_decode(json_encode($datos_rechazados_calificados2019), true);

                                if (count($datos_rechazados_calificados2019)<>0){
                                  $cont=count($datos_rechazados_calificados2019);
                                 //print_r($datos);
                                 for($i=0;$i<=$cont-1;$i++) {
                                      
                                           echo '{';
                                        echo 'name:\''.$datos_rechazados_calificados2019[$i]['nombre'].'\',';
                                        echo 'data:['.$datos_rechazados_calificados2019[$i]['cantidad'].']';
                                        echo '},';
                                  }
                              }else{

                              }
                            }

                         @endphp   
            
        
        ]
    });

        </script>
@endsection