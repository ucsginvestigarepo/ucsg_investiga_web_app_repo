<html>
<head></head>
<body>
<div align="center">  
        <img src="{{asset('img/logoucsg.png')}}" alt="">
        <h2>Universidad Católica de Santiago de Guayaquil</h2>
        <h3>Proyecto UCSG Investiga informa</h3>
</div>

<style type="text/css">
	.pinta_azul_campeon{
		color: darkblue;
	}
</style>

<br>
Estimado usuario, <span class="pinta_azul_campeon">{{strtoupper($contenido["nombre"])}}</span><br>
Nuestra universidad le da la bienvenida a nuestro concurso UCSG Investiga. Se ha registrado con el número de cédula {{$contenido["cedula"]}}
<br>
<strong>Sus credenciales son:</strong>
<br>
Usuario: {{$contenido["correo"]}}
<br>
Password: {{$contenido["clave"]}}
<br>
<br>
<strong>Le recordamos que su participación es importante en nuestro concurso, por lo que por favor una vez registrado nuestro administrador procedera asignarle un rol de usuario.</strong>
<br>Agradecemos su participación.

</body>
</html>