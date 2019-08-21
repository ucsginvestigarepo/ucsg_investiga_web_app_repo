<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
         <!-- description site  --> 
        <meta name="description" content="Bienvenido a nuestro sitio web del concurso ucsg investiga">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ucsg Investiga Web App</title>
         <!-- icon investiga  -->   
        <link rel="shortcut icon" href="{{asset('img/AppIconsUcsgInvestiga/AppIcon1024x1024.png')}}" />
        <!--  people related  -->   
        <link rel="author" type="text/plain" href="related-people.txt">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- flexslider css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/flexslider.css') }}">
       <!--  css files site -->
        <link rel="stylesheet" href="{{ asset('css/prueba-css.css') }}" />
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </head>

<style type="text/css">
    @media screen and (max-width: 720px) {
      h1 img{
        width: 75%;
      }

      header{
        width: 94%;
      }

      footer{
         width: 94%;
      }

      nav ul{
        list-style: none;
      }

      nav li{
        display: inline-block;
        padding: 0.1em;
        vertical-align: top;
      }

      nav li {
        font-size: 1em;
      }

      footer *{
        padding: 0.25em;
      } 

      /* Acerca Section */
      .jumbotron{
        max-width: 100%;
      }
      .jumbotron h1{
        font-size: 1.6em;
      }

      .jumbotron h4{
        font-size: 1.4em;
      }

      .jumbotron h5{
        font-size: 1.2em;
      }

      .card{
        width: 50%
      }

      .card img{
        width: 30%;
      }

      section#principal{
        width: 85%;
      }

}

@media screen and (min-width: 525px) and (max-width: 670px)  {
      section#principal{
              background: url(/img/wallpaper-concurso.jpg);
              width: 100%;
              max-width: 100%;
              display: block;
            }

            .card {
            margin-bottom: 1em !important;
          }
}

 @media screen and (max-width: 500px) {
            nav li{
                display: block;
                vertical-align: top;
            }

            article#gallery-ucsg-investiga-portfolio{
                width: 90%;
            }

            aside{
                width: 10%;
            }

            div.card{
              margin-bottom: 0.50em;
            }

            section#principal{
              background: url(/img/wallpaper-concurso.jpg);
              width: 100%;
              max-width: 100%;
              display: block;
            }

             .card {
            margin-bottom: 1em !important;
          }
    }

  @media screen and (min-width: 300px) and (max-width: 399px) {
            nav li{
                display: block;
                vertical-align: top;
            }

            article#gallery-ucsg-investiga-portfolio{
                width: 100%;
            }

            aside{
                width: 100%;
            }

             .card {
            margin-bottom: 1em !important;
          }
    }
</style>

    <body>
        <div class="flex-center position-ref full-height">
    
            <section id="contenedorHomePage">
                <header>
                <h1>
                    <!-- <a href="{{ url('home-page-investiga')}}"> </a>-->
                    <img src="/img/ucsg-investiga-medium.png" class="" alt="ucsg-investiga-web-app | web app para el concurso ucsg investiga, que incentiva
                    a investigación científica." />
                   
                </h1>

                <nav>
                    <li><a href="{{ url('home-page-investiga')}}">Inicio</a></li>
                    <li><a href="{{ url('acerca-page-investiga')}}">Acerca</a></li>
                    <li><a href="{{ url('quienes-somos-page-investiga')}}">Quiénes Somos</a></li>
                    <li><a href="{{ url('dominios-page-investiga')}}">Dominios de Investigación</a></li>
                    <li><a href="{{ url('contacto-page-investiga')}}">Contáctenos</a></li>
                    <li id="sistema"><a href="{{ url('system')}}">Sistema</a></li>
                </nav>
            </header>

             <section id="contenedorPrincipal">
                <section id="principal">
                    <article id="Acerca_Concurso">
                       <!-- <section id="calificaciones"> <img src="/img/matriz_calificaciones_concurso_2019.png"></section>
                       <section id="formato">  <img src="/img/formato_documento__concurso_2019.png"></section>
                       <section id="normativa">  <img src="/img/normativas_concurso_2019.png"></section>
                       <section id="premios">  <img src="/img/premios_concurso_2019.png"></section> -->

                       <section id="infoAcercaConcurso">
                           <div class="container">
                            <div class="jumbotron">
                              <h1>Acerca del concurso</h1>      
                              <h4><p>En esta sección encontraras todos los documentos referentes al concurso.</p></h4>
                              <h5><p>Da click en los botones de descargar, para descargarlos en tu dispositivo.</p></h5>
                            </div>

                            <div class="row cardParent">
                              <div class="col-sm-6 col-md-6">
                                <div class="card" style="max-width: 18rem;">
                                    <img src="/img/pdf_icon2.png" class="card-img-top img-fluid" alt="...">
                                    <div class="card-body">
                                      <h5 class="card-title">Normativas</h5>
                                      <p class="card-text text-center">Descarga aqui las normativas de participacion del concurso, UCSG Investiga 2019.</p>
                                      <a href="{{ url('/documentos/NORMATIVA_CONCURSO.pdf') }}" target="_blank" class="btn btn-primary">Ir a Normativas</a>
                                    </div>
                                  </div>
                              </div>

                              <div class="col-sm-6 col-md-6">
                                <div class="card" style="max-width: 18rem;">
                                    <img src="/img/pdf_icon2.png" class="card-img-top img-fluid" alt="...">
                                    <div class="card-body">
                                      <h5 class="card-title">Premios</h5>
                                      <p class="card-text text-center">Descarga aqui los premios de participacion del concurso, UCSG Investiga 2019.</p>
                                       <a href="{{ url('/documentos/PREMIOS_CONCURSO.pdf') }}" target="_blank" class="btn btn-primary">Ir a Premios</a>
                                    </div>
                                  </div>
                              </div>
                            </div>

                            <div class="row cardParent">
                              <div class="col-sm-6 col-md-6">
                                <div class="card" style="max-width: 18rem;">
                                    <img src="/img/pdf_icon2.png" class="card-img-top img-fluid" alt="...">
                                    <div class="card-body">
                                      <h5 class="card-title">Formato del Reporte</h5>
                                      <p class="card-text text-center">Descarga aqui el formato del reporte del concurso,   UCSG Investiga 2019.</p>
                                      <a href="{{ url('/documentos/FORMATO_CONCURSO.pdf') }}" target="_blank" class="btn btn-primary">Ir a Formato del Reporte</a>
                                    </div>
                                  </div>
                              </div>

                              <div class="col-sm-6 col-md-6">
                                <div class="card" style="max-width: 18rem;">
                                    <img src="/img/pdf_icon2.png" class="card-img-top img-fluid" alt="...">
                                    <div class="card-body">
                                      <h5 class="card-title">Matriz de Calificaciones</h5>
                                      <p class="card-text text-center">Descarga aqui la matriz de calificaciones del concurso, UCSG Investiga 2019.</p>
                                      <a href="{{ url('/documentos/CALIFICACIONES_CONCURSO.pdf') }}" target="_blank" class="btn btn-primary">Ir a Matriz de Calificaciones</a>
                                    </div>
                                  </div>
                              </div>
                            </div>

                                
                          </div>
                       </section>
                    </article>
                </section>
                <aside>
                     
                      
                </aside>
            </section>
            
            <footer>
                <br>
                <span>Universidad Católica de Santiago de Guayaquil, Desarrollado para</span> 
               <a rel="author" href="https://www.ucsg.edu.ec/
                " target="_blank">(UCSG Investiga)</a>
            </footer>
            </section>



        </div>
    </body>
</html>

  <!-- jQuery -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

  <!-- FlexSlider -->
  <script defer src="{{ asset('js/jquery.flexslider.js') }}"></script>

<script type="text/javascript">
    $(window).load(function() {
      $('.flexslider').flexslider({
        animation: "slide",
        controlNav: "true"
      });
    });
</script>