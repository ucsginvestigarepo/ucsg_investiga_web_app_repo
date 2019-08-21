<html>
<head></head>

<style type="text/css">
	strong, span, label{
		/*font-size: 1.2em;*/
	}
	.pinta_azul_campeon{
		color: darkblue;
	}
</style>
<body>
	<div align="center">  
        <img src="{{asset('img/logoucsg.png')}}" alt="">
        <h2>Universidad Católica de Santiago de Guayaquil</h2>
        <h3>Proyecto UCSG Investiga informa</h3>
	</div>

<br>
<label>Estimado usuario, <span class="pinta_azul_campeon">{{strtoupper($contenido["nombre"])}}</span></label><br>
<label>Nuestra Universidad le da la bienvenida a nuestro concurso UCSG Investiga.</label>
<br>

<strong>Mensaje Recibido:</strong><br>
<label>Nombre: </label><!-- <br> -->
<span>{{$contenido['nombre']}}</span><br>

<label>Email: </label><!-- <br> -->
<span>{{$contenido['email']}}</span><br>

<label>Asunto: </label><!-- <br> -->
<span>{{$contenido['asunto']}}</span><br>

<label>Comentario: </label><br>
<span>{{$contenido['comentario']}}</span><br>

<span>Saludos Cordiales...</span>
 
</body>
</html>