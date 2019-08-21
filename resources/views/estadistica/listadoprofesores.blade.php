@extends('themes/lte/layaout')

@section('tituloForm')
   <h2 class="text-center"><u>Estadísticas</u></h2>
   <h3></h3>
   
   <a href="{{ url('estadistica') }}" class="btn btn-primary pull-right"><i class="fa fa-undo"></i> Regresar</a>
@endsection

@section('contenedor')
       
    <div class="desplazamiento">
        <div id="pastel" style="min-width: 500px; height: 400px; max-width: 100%; margin: 0 auto"></div>
    </div>
        
      
@endsection

@section('graficas')

        <script type="text/javascript">
            Highcharts.chart('pastel', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Participantes del concurso UCSG Investiga'
                },
                 subtitle: {
                 text: 'Proyecto UCSG Investiga'
                },

                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '{point.name}: <b>{point.percentage:.1f}%</b>',
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
                               $datos=json_decode(json_encode($datos), true);
                               
                               $cont=count($datos);
                               //print_r($datos);
                               for($i=0;$i<=$cont-1;$i++) {
                                    
                                        echo '{';
                                        echo 'name:\''.$datos[$i]['nombre'].'\',';
                                        echo 'y:'.$datos[$i]['cantidad'];
                                        echo '},';
                               }
                            @endphp   
                                                   
                    ]
                }]
            });
        </script>
@endsection