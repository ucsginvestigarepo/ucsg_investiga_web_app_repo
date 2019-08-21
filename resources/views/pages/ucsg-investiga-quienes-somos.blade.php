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
       <!--  css files -->
        <link rel="stylesheet" href="{{ asset('css/prueba-css.css') }}" />
   
    </head>

    <style type="text/css">
      section#mision,  section#vision, section#politicas {
        background-color: rgba(61, 200, 189,0.85) !important;
      }
    </style>

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

      aside{
        margin-top: 1em;
        margin-bottom: 1em;
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
    width: 94%;
    display: block;
  }

  aside #widgetsSociales{
    color: darkblue;
  }
}

@media screen and (min-width: 410px) and (max-width: 650px){
  header, section#contenedorPrincipal, footer{
    width: 94%;
  }

  section#principal{
    width: 94%;
    display: block;
  }

  aside{
    width: 94%;
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
                    <!-- <a href="{{ url('home-page-investiga')}}"> -->
                    <img src="/img/ucsg-investiga-medium.png" class="fade" alt="ucsg-investiga-web-app | web app para el concurso ucsg investiga, que incentiva
                    a investigación científica." />
                    </a>
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
                    <article id="mision">
                        <strong>Misión</strong>
                        <p>Promover y consolidar una cultura de investigación en la UCSG a través de la generación del conocimiento científico, básico y aplicado, para contribuir al desarrollo integral y sustentable del Ecuador.</p>
                    </article>
                        <hr class="estiloLinea">
                        <article id="vision">
                             <strong>Visión</strong>
                            <p>El SINDE se ha propuesto posicionar y hacer reconocer a la UCSG como una de las principales universidades de investigación del Ecuador y Latinoamérica, por su producción científica, generación del conocimiento, preservación y desarrollo de la cultura, que contribuyen a la ciencia y a la sociedad, desde la perspectiva del desarrollo humano integral y sostenible, con una fuerte articulación e integración a redes del conocimiento y con los actores sociales, públicos y privados, regionales, nacionales e internacionales.</p>
                        </article>
                          <hr class="estiloLinea">
                          <article id="politicas">
                            <strong>Politicas</strong><br>
                            <span>Entre las políticas que el SINDE prioriza se exponen las siguientes:</span>
                            <ul class="listItemPoliticas">
                                <li>Multidisciplinariedad e interdisciplinariedad de enfoques en las investigaciones y proyectos desarrollados.</li>
                                <li>Promoción de la sistematización didáctica en todos los proyectos de investigación.</li>
                                <li>Promoción de la cultura de investigación.</li>
                                <li>Fortalecimiento de competencias de los investigadores, docentes, estudiantes y personal de apoyo para la investigación.</li>
                                <li>Revisión permanente de los procesos de investigación para asegurar estándares de calidad científica.</li>
                                <li>Articulación de la investigación entre las facultades, carreras, programas, institutos y centros de investigación.</li>
                                <li>Articulación de la investigación con el subsistema de posgrado.</li>
                                <li>Articulación de la investigación con el subsistema de investigación del conocimiento y el entorno.</li>
                                <li>Socialización de los resultados de las investigaciones realizadas en medios de difusión calificados.</li>
                                <li>Gestión administrativa y financiera para desarrollar la investigación.</li>
                                <li>Rendición de cuentas de la investigación desarrollada con fondos asignados al SINDE y de los planes elaborados, al Vicerrectorado de Investigación y Posgrado, y a las diferentes unidades y subsistemas.</li>
                            </ul>
                          </article>
                       
                  <br>
                    <article id="QuienesSomos_Concurso">
                        <section id="quienes_somos"> <img src="/img/quienesSomos_ucsgInvestiga.png"></section>
                      
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
