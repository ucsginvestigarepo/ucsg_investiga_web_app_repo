<html>
<head></head>
<body>

<style type="text/css">
	.pinta_azul_campeon{
		color: darkblue;
	}
</style>

<div align="center">  
        <img src="{{asset('img/logoucsg.png')}}" alt="">
        <h2>Universidad Católica de Santiago de Guayaquil</h2>
        <img src="{{asset('img/ucsg-investiga-logo.png')}}" alt="">
        <h3>Proyecto UCSG Investiga informa</h3>
</div>

<br>
Estimado usuario, <strong class="pinta_azul_campeon">{{$contenido["usuario"]}}</strong>  <br>
Nuestra Universidad le da la bienvenida a nuestro concurso UCSG Investiga. Se comunica lo siguiente.
<br>
<strong>Su propuesta tiene un estado de: {{$contenido["estado"]}}</strong>
<br>

<?php 

	// dd($contenido);
	$porciones = explode(".", $contenido["motivorechazo"]);
	for ($i=0; $i < count($porciones) ; $i++) { 
		# code...
		$union[$i] = $porciones[$i];
	}
 ?>


@if ($contenido["estado"]=="RECHAZADO")
    <br>Su propuesta ha sido rechazada por lo siguiente:<br> <br>
    <!-- {{$contenido["motivorechazo"]}} -->
  	<!--  @foreach($union as $value)
    	{{ $value }} 
   
	@endforeach -->
	@for($i=0; $i < count($union); $i++)
		{{$union[$i]}} <br><br>
	@endfor
@endif
<br>
<!-- <br> -->
<strong>Información de la propuesta registrada:</strong>
<br>
Proceso:{{$contenido["proceso"]}}<br>
<!-- Docente: {{$contenido["usuario"]}} -->
<br>
<br>
Propuesta creada el: {{$contenido["creado"]}}<br>
Dominio: {{$contenido["dominio"]}}<br>
Propuesta: {{$contenido["propuesta"]}}<br>
<!-- Gestor: {{$contenido["gestor"]}}<br>
Revisor: {{$contenido["revisor"]}}<br>
2do Revisor: {{$contenido["revisor2"]}}<br>
3er Revisor: {{$contenido["revisor3"]}}<br> -->

@if ($contenido["mensaje"]=="RECALIFICAR")
<h3><strong>Se informa lo siguiente:</strong></h3><br>
Su propuesta tiene un estado de recalificación la cual sobrepaso la mínima diferencia de 30 puntos entre notas del 1 y 2 revisor, se detectan las siguientes notas:<br>
Nota 1: {{$contenido["nota1"]}}<br>
Nota 2: {{$contenido["nota2"]}}<br>
<strong>La calificación del tercer revisor promediará su calificación, podrá revisar su nota visitando la página web del concurso.</strong>
@endif
<br>
<br>
<strong>Le recordamos que su participacion es importante en nuestro concurso. El uso de sus credenciales es su responsabilidad.</strong>

</body>
</html>