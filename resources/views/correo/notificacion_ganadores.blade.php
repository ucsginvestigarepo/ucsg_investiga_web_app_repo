<html>
<head></head>
<body>
<div align="center">  
        <img src="{{asset('img/logoucsg.png')}}" alt="">
        <h2>Universidad Catolica de Santiago de Guayaquil</h2>
        <h3>Proyecto UCSG Investiga informa</h3>
</div>

<style type="text/css">
	.pinta_azul_campeon{
		color: darkblue;
	}
</style>

<br>
Estimado usuario, <span class="pinta_azul_campeon">{{strtoupper($contenido["nombre"])}}</span><br>
Nuestra universidad hace entrega de un certificado por haber Ganado en nuestro concurso UCSG Investiga  {{$contenido["ano_ganador"]}}. Se adjunta documento PDF el cual podra imprimirlo y hacer uso como bien convenga.

<br>
<br>
<!-- <strong>Le recordamos que su participacion es importante en nuestro concurso, por lo que por favor una vez registrado nuestro administrador procedera asignarle un rol de usuario.</strong> -->
<!-- <br> -->Agradecemos su participacion.

</body>
</html>
