@extends('themes/lte/layaout')

@section('tituloForm')
   <h2 class="text-center"><u>Estadísticas</u></h2>
   <h3></h3>
   
   <a href="{{ url('estadistica') }}" class="btn btn-primary pull-right"><i class="fa fa-undo"></i> Regresar</a>
@endsection

@section('contenedor')
       
   <div class="desplazamiento">
        <div id="columnasAgrupadas" style="min-width: 500px; height: 500px; max-width: 100%; margin: 0 auto"></div>
   </div>
        
      
@endsection

@section('graficas')

<script type="text/javascript">
    Highcharts.chart('columnasAgrupadas', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Comparativa entre temas rechazados y calificados <strong>(COMPARATIVA)</strong>'
        },
         subtitle: {
            text: 'Proyecto UCSG Investiga'
        },
        xAxis: {
            categories: [
                            @php
                               $datos=json_decode(json_encode($rechazadosvscalificados_comparativa), true);
                               
                               $cont=count($datos);
                               //print_r($datos);
                               for($i=0;$i<=$cont-1;$i++) {
                                    
                                       echo '\''.$datos[$i]['nombre'].'\',';
                                                                              
                               }
                            @endphp  
            
            
            ],
            title: {
                text: '<strong>c a n t i d a d</strong>'
            }
        },
        yAxis: {
            allowDecimals: false,
            min: 0,
            title: {
                text: '<strong>t e m a s</strong>',
                //align: 'high'
            },
            labels: {
                overflow: 'justify'
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