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
        <!-- <link rel="stylesheet" type="text/css" href="{{ asset('css/flexslider.css') }}"> -->
       <!--  css files site -->
        <link rel="stylesheet" href="{{ asset('css/prueba-css.css') }}" />
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
}

@media screen and (max-width: 715px) {
  header, section#contenedorPrincipal, footer{
    width: 94%;
  }

  section#principal{
    width: 94%;
    display: block;
  }

  aside{
    background: url(/img/wallpaper-concurso.jpg);
    width: 100%;
    display: block;
  }

  aside #widgetsSociales{
    color: darkblue;
  }
}

 @media screen and (max-width: 425px) {
             header, section#contenedorPrincipal, footer{
              width: 94%;
            }

            section#contenedorPrincipal{
              margin: 0 auto;
              text-align: center;
            }

            section#principal{
              width: 94%;
              display: block;
              text-align: center;
            }

            section#principal *{
              text-align: center;
              margin: 0 auto;
            }

            nav li{
                display: block;
                vertical-align: top;
            }

            article#gallery-ucsg-investiga-portfolio{
                width: 100%;
            }

            aside{
                width: 94%;
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
                width: 94%;
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
                    <article id="gallery-ucsg-investiga-portfolio">
                        <div class="slider">
                            <div>
                              <img href=""
                              src="/img/ucsg-investiga-home.jpg">
                               <p class="flex-caption">#UCSGInvestiga
                                    Nuestro Vicerrector de Investigación y Posgrado de la Universidad Católica de Santiago de Guayaquil (#UCSG), Ing. Walter Mera Ortiz, PhD. recibió la visita de estudiantes 8vo ciclo de la carrera de Medicina #UCSG que viajarán a México para realizar pasantías de Investigación. ¡Felicitaciones!
                                    En la imagen constan (iz/der): Cinthya Cuadros; Grace Arias Bayas; Ing. Walter Mera Ortiz, PhD, Andrés Reyes Arregui y Pablo Jiménez.
                                    Más información: <a  class="" href="https://www.ucsg.edu.ec/sinde/" target="_blank"> https://www.ucsg.edu.ec/sinde//</a></p>
                            </div>

                            <div>
                              <img href=""
                               src="/img/ucsg-investiga-resultados-2018.jpg" />
                               <p class="flex-caption">Ganadores del II concurso
                                #UCSGInvestiga2018 
                                Felicitaciones, a los docentes investigadores de la #UCSG, ganadores del II Concurso #UCSGInvestiga, organizado por el Vicerrectorado de Investigación y Posgrado a través del Subsistema de Investigación y Desarrollo (SINDE). #SomosUCSG..</p>
                            </div>

                            <div>
                              <img href=""
                              src="/img/ucsg-investiga-ganadores-dominio-economia-2018.jpg" />
                               <p class="flex-caption"> Ganadoras UCSG 2018, dominio de investigacion Economias para el desarrollo productivo.</p>
                            </div>

                              
                          
                        </div>

                    </article>
                </section>
                <aside>
                    <span id="widgetsSociales">Widgets Sociales</span> <br>
                     <!-- Twitter plug -->
                      <script src="http://platform.twitter.com/widgets.js" /></script>
                      <a href="http://twitter.com/share" class="twitter-share-button" data-text="#ucsg-investiga.com | web app para el concurso ucsg investiga, que incentiva la investigación científica." data-url="https://twitter.com/ucatolicagye" data-count="vertical">Twittear</a>
                      <br /><br />
                      <!-- Facebook plug-->
                      <div id="fb-root"></div>
                      <script src="http://connect.facebook.net/es_LA/all.js#xfbml=1"></script>
                      <fb:like href="https://www.facebook.com/UCSGye/" send="false" layout="box_count" show-faces="false" font="tahoma"></fb:like>
                      <br /><br />
                      <!-- Instagram plug -->
                      <style>.ig-b- { display: inline-block; }
                      .ig-b- img { visibility: hidden; }
                      .ig-b-:hover { background-position: 0 -60px; } .ig-b-:active { background-position: 0 -120px; }
                      .ig-b-48 { width: 48px; height: 48px; background: url(//badges.instagram.com/static/images/ig-badge-sprite-48.png) no-repeat 0 0; }
                      @media only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min--moz-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2 / 1), only screen and (min-device-pixel-ratio: 2), only screen and (min-resolution: 192dpi), only screen and (min-resolution: 2dppx) {
                      .ig-b-48 { background-image: url(//badges.instagram.com/static/images/ig-badge-sprite-48@2x.png); background-size: 60px 178px; } }</style>
                      <a href="https://www.instagram.com/ucsgye/?hl=es-la" target="_blank" class="ig-b- ig-b-48"><img src="//badges.instagram.com/static/images/ig-badge-48.png" alt="Instagram" /></a>
                      <!-- Publicidad -->
                      <figure id="figurePublicidad">
                        <a class="fade" href="https://www.ucsg.edu.ec/sinde/" target="_blank">
                          <img src="/img/enterate_mas_sobre_concurso.png" width="300" height="300" alt="Publicidad" />
                          <figcaption>Enterate más sobre nuestro concurso.</figcaption>
                        </a>
                      </figure>

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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>

  <!-- FlexSlider -->
 <!--  <script defer src="{{ asset('js/jquery.flexslider.js') }}"></script> -->

 <script>
    $(document).ready(function(){
      $('.slider').bxSlider({
          touchEnabled: false,
           auto: true
      });
      
    });
  </script>