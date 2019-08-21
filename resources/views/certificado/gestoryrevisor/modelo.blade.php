<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Certificado de Participación GESTOR/REVISOR </title>
    <link rel="shortcut icon" href="{{asset('img/AppIconsUcsgInvestiga/AppIcon1024x1024.png')}}" />
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
</head>

<style type="text/css">
    strong{
        color: black !important;
        font-weight: bold;
    }

    h5{
        font-weight: bold;
    }

    .logoinvestiga{
        vertical-align: baseline;
    }

    .ano-concurso{
        vertical-align: middle;
        font-weight: bold;
        font-size: 1.2em;
    }

    .pie_pagina{
        position:fixed;
        right:0px;
        bottom:0px;
        height:30px;
    }
</style>
<body>
    <div align="center">
            <img src="{{asset('img/logoucsg.png')}}" alt="">
           <h3>CERTIFICADO</h3>
            <h3>CONCURSO UCSG-INVESTIGA</h3>
              <div>
                 <img class="logoinvestiga" src="{{asset('img/ucsg-investiga-logo.png')}}" alt=""/>
                <span class="ano-concurso">{{date('Y')}}</span>
            </div>
    </div>
    @foreach ($datos as $item)

    <div>
        <section>
        <p><h3><strong>Se confiere el presente certificado al docente:  {{$item->nombres}}</strong></h3></p>
        <p class="text-justify">El Vicerrectorado de Investigación y Posgrado encargada de la organización, seguimiento de este concurso haciendo cumplir todas las normas aplicadas para la participación de nuestros docentes. Nos honra entregar este documento que garantiza su participación como {{strtoupper($item->rol)}}, en los temas propuestos por los docentes académicos.</p>
        <p>El comite evaluador integrado por:</p>
        <ol>
                <li>Rector</li>
                <li>Vicerrector de investigación y Posgrado</li>
                <li>Director del Subsistema de investigación</li>
                <li>Director del Subsistema de Posgrados</li>
                <li>Directores del Instituto de Investigación e Innovación</li>
        </ol>
        <p class="text-justify">Agradecemos su participación en este novedoso concurso que incentiva a la investigación científica y desarrollo de nuestra Universidad.</p>
        
        </section>
    </div>
    <div align="center">
           <h3>Sello de Validación</h3><br>
            @php
                $cadena= "
               <strong> SELLO DE VALIDACIÓN </strong> <br>
                Id: ".base64_encode($item->id)." <br>
                Fecha de creación: ".date('Y-m-d')." <br>
                Año: ".$item->ano." <br>
                Cédula: ".$item->cedula." <br> 
                Nombre: ".$item->nombres." <br>
                Email: ".$item->email." <br>
                Rol: ".$item->rol." ";

            @endphp
            <img src="data:image/png;base64, {{ base64_encode(QrCode::format('png')->size(180)->generate($cadena)) }} ">

            <!-- <br><br><br> -->

            <span class="pie_pagina">UCSG INVESTIGA {{$item->ano}} </span>

            <!-- Se envia a generar la encriptacion del id usuario por temas de seguridad -->
    </div>
    @endforeach
</body>
</html>
