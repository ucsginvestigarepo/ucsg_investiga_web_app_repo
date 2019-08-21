@extends('themes/lte/layaout')

@section('tituloForm')
   <h2 class="text-center"><u>Estadísticas</u></h2>
   <h3></h3>
   
   <a href="{{ url('estadistica') }}" class="btn btn-primary pull-right"><i class="fa fa-undo"></i>  Regresar</a>
@endsection

@section('contenedor')
       
    <div class="desplazamiento">
        <div id="pastel_Facultades" style="min-width: 500px; height: 400px; max-width: 100%; margin: 0 auto"></div>
    </div>
        
      
@endsection

@section('graficas')

<script type="text/javascript">
    Highcharts.chart('pastel_Facultades', {
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
                               $datos=json_decode(json_encode($datos), true);
                               
                               $cont=count($datos);
                               //print_r($datos);
                               for($i=0;$i<=$cont-1;$i++) {
                                    
                                        echo '[';
                                        echo '\''.$datos[$i]['nombre'].'\',';
                                        echo $datos[$i]['cantidad'];
                                        echo '],';
                               }
                @endphp   
               
            ]
        }]
    });
</script>

@endsection