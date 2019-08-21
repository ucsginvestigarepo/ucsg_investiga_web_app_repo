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

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

       <!--  css files -->
        <link rel="stylesheet" href="{{ asset('css/prueba-css.css') }}" />
   
    </head>

    <style type="text/css">
      section#contenedorPrincipal .contactForm{
        background-color: rgba(61, 200, 189,0.85) !important;
      }

      legend{
        color: red;
      }

      #FormContact legend, #FormContact label{
        text-align: center;
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
    section#principal{
      width: 100%;
      display: block;

    }

    label,input{
      display: block;
      margin: 0 auto;
    }

    aside{
      width: 100%;
    }

    section#mapa{
      width: 100%;
      margin: 0 auto;
    }

    iframe{
      width: 100%;
      max-width: 100%;
    }
  }

 @media screen and (max-width: 400px) {
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
    }
</style>

    <body>
        <div class="flex-center position-ref full-height">
  
            <section id="contenedorHomePage">
                <header>
                <h1>
                    <!-- <a href="{{ url('home-page-investiga')}}"> -->
                    <img src="/img/ucsg-investiga-medium.png" class="" alt="ucsg-investiga-web-app | web app para el concurso ucsg investiga, que incentiva
                    a investigación científica.">
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
                <section id="principal" class="contactForm">
                    <article id="info-concurso-invetiga">
                      <p>
                        <h2 style="background-color: whitesmoke;border-radius: 0.5em;">Contáctanos</h2>
                        Email:
                        <span class="datos-contacto">contactcenter@cu.ucsg.edu.ec </span>
                        <span class="datos-contacto">, info@cu.ucsg.edu.ec </span> <br>
                        Teléfonos:
                        <span class="datos-contacto">(04) 380 4600</span><span>, </span>
                        <span class="datos-contacto">(04) 380 4601</span><span>, </span>
                        <span class="datos-contacto">(04) 222 2024</span><span>, </span><br>
                        Web:
                        <span class="datos-contacto"><a href="https://www.ucsg.edu.ec">https://www.ucsg.edu.ec</a></span><br />
                        Dirección:
                        <span class="datos-contacto">Universidad Católica de Santiago de Guayaquil.</span>
                        </p>
                        <br />
                        Social Media:<br />
                       <div style="background-color: white;border-radius:0.5em;"> <span class="datos-contacto">
                          <a class="" href="https://www.facebook.com/UCSGye/" target="_blank" title="Facebook"><img src="img/fa.png" width="48" height="48" /></a>
                          &nbsp;&nbsp;&nbsp;
                          <a class="" href="https://twitter.com/ucatolicagye" target="_blank" title="Twitter"><img src="img/twitta.png" width="48" height="48" /></a>
                          &nbsp;&nbsp;&nbsp;
                          <a class="" href="https://www.instagram.com/ucsgye/?hl=es-la" target="_blank" title="Instagram"><img src="img/insta.jpg" width="48" height="48" /></a>
                          &nbsp;&nbsp;&nbsp;
                        
                        </span></div>

                         @if (session()->has('flash'))
                            <div class="alert alert-primary alert-dismissible"> {{ session('flash')}}</div>
                         @endif
                      
                    </article>

                    <section>
                      <form role="form" id="FormContact" method="POST" action="/pages/enviarComentarioToAdmin">
                         {{ csrf_field() }}
                        <fieldset>
                          <legend>Envianos tus comentarios</legend><br>
                          
                          <div>
                            <label for="nombre">Nombre:</label><br>
                            <input type="text" id="nombre" class="" name="nombre" required />
                          </div><!-- <br> -->

                          <div>
                            <label for="email">Email:</label><br>
                            <input type="email" id="email" class="" name="email" required />
                          </div><!-- <br> -->

                          <div>
                            <label for="asunto">Asunto:</label><br>
                            <input type="text" id="asunto" class="" name="asunto" required />
                          </div><!-- <br> -->

                          <div>
                            <label for="comentarios">Comentarios:</label><br>
                            <textarea id="comentario" clas="" name="comentario" cols="31" rows="5" required></textarea>
                          </div><!-- <br> -->

                          <div>
                            <input type="submit" id="enviar" class="btn" name="enviar_btn" value="Enviar" />
                          </div>

                        </fieldset>
                      </form>

                    </section>
                </section>
                <aside>
                   <!--  <span id="widgetsSociales">Widgets Sociales</span> <br> -->
                     <section id="mapa">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3986.9261856681123!2d-79.90615168542607!3d-2.1817076984097334!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x902d6d80d5fc034f%3A0x173636d8f79dec15!2sUniversidad+Cat%C3%B3lica+de+Santiago+de+Guayaquil!5e0!3m2!1ses!2sec!4v1565492045946!5m2!1ses!2sec" width="400" height="535" frameborder="0" style="border:0;border-radius: 0.5em;" allowfullscreen></iframe>
                        <br />
                        <small><a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3986.9261856681123!2d-79.90615168542607!3d-2.1817076984097334!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x902d6d80d5fc034f%3A0x173636d8f79dec15!2sUniversidad+Cat%C3%B3lica+de+Santiago+de+Guayaquil!5e0!3m2!1ses!2sec!4v1565492045946!5m2!1ses!2sec" style="color:yellow;text-align:left" target="_blank">Ver mapa más grande</a></small>
                    </section>
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
