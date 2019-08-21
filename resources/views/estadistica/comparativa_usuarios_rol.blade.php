
@extends('themes/lte/layaout')

@section('tituloForm')
   <h2 class="text-center"><u>Estadísticas</u></h2>
   <h3></h3>
   
   <a href="{{ url('estadistica') }}" class="btn btn-primary pull-right"><i class="fa fa-undo"></i> Regresar</a>
@endsection

@section('contenedor')
       
   <div class="desplazamiento">
        <div id="pastel" style="min-width: 500px; height: 500px; max-width: 100%; margin: 0 auto"></div>
   </div>
        
      
@endsection


@section('graficas')

<script type="text/javascript">
    Highcharts.chart('pastel', {
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Cantidad de usuarios por rol <strong>(COMPARATIVA)</strong>'
        },
         subtitle: {
            text: 'Proyecto UCSG Investiga'
        },
        xAxis: {
            categories: [
                            @php
                               $datos=json_decode(json_encode($usuarios_rol_comparativa), true);
                               
                               $cont=count($datos);
                               //print_r($datos);
                               for($i=0;$i<=$cont-1;$i++) {
                                    
                                       echo '\''.$datos[$i]['nombre'].'\',';
                                                                              
                               }
                            @endphp  
            
            
            ],
            title: {
                text: '<strong>u s u a r i o s _ r o l</strong>'
            }
        },
        yAxis: {
            allowDecimals: false,
            min: 0,
            title: {
                text: '<strong>c a n t i d a d</strong>',
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
        tooltip: {
            
        },
        plotOptions: {
            column: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -40,
            y: 0,
            floating: true,
            borderWidth: 1,
            backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
            shadow: true
        },
        credits: {
            enabled: false
        },
        series: [ 
                            @php
                               $datos=json_decode(json_encode($completo), true);
                               
                               $cont=count($datos);
                               //print_r($datos);
                               for($i=0;$i<=$cont-1;$i++) {
                                    
                                        echo '{';
                                        echo 'name:\''.$datos[$i]['ano'].'\',';
                                        echo 'data:['.$datos[$i]['cantidad'].']';
                                        echo '},';
                               }
                            @endphp  
        ]
    });
</script>
       
@endsection