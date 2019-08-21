<style type="text/css">
  .user-header{
    background-color: darkblue !important;
  }

  .btn-logout{
    background-color: darkblue !important;
    color:white !important;
    font-weight: bold;

  }

  .btn-logout:hover{
    background-color: cyan !important;
    color: black !important;
  }
</style>

<header class="main-header">
    <!-- Logo -->
   <a href="{{ url('menu') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"> <img src="{{asset('img/logopequeno.png')}}" alt=""></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">
      <img src="{{asset('img/ucsg-investiga-logo.png')}}" style="border-radius: 0.5em;" alt="">    
      
      </span>
    </a>
   
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          <!-- Notifications: style can be found in dropdown.less -->
          
          <!-- Tasks: style can be found in dropdown.less -->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              @if (Auth::check())
                @if (strlen(auth()->user()->rutaarchivo)>2)
                  <img src="{{asset('storage/'.auth()->user()->rutaarchivo)}}" class="user-image" alt="User Image">

                @else
                  <img src="{{asset('img/usuario.png')}}" class="user-image" alt="User Image"> 
                @endif
              @else
                <img src="{{asset('img/usuariono.png')}}" class="user-image" alt="User Image">
              @endif
              
            <span class="hidden-xs">
              @if (Auth::check())
                {{ auth()->user()->name}}
              @else
                 No hay inicio de sesion 
              @endif
              </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                 
                @if (Auth::check())
                  @if (strlen(auth()->user()->rutaarchivo)>2)
                    <img src="{{asset('storage/'.auth()->user()->rutaarchivo)}}" class="user-image" alt="User Image">
      
                  @else
                    <img src="{{asset('img/usuario.png')}}" class="user-image" alt="User Image"> 
                  @endif
                @else
                  <img src="{{asset('img/usuariono.png')}}" class="user-image" alt="User Image">
                @endif
                <p>
                  UCSG<br>
                  @if (Auth::check())
                    {{ auth()->user()->name}}
                    <small>{{ auth()->user()->created_at}}</small>
                  @else
                     No hay inicio de sesion 
                  @endif
                 
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                 @if (Auth::check())
                    <p>Cédula: {{ auth()->user()->cedula}}</p>
                    <p>Correo: {{ auth()->user()->email}}</p>
                    <p>Teléfono: {{ auth()->user()->telefono}}</p>
                  
                @else
                   Sin datos que mostrar
                @endif
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#"></a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#"></a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#"></a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                
                </div>
                @if (Auth::check())
                  <div class="pull-right">
                     <a href="{{ url('logout') }}" class="btn btn-default btn-flat btn-logout">Salir</a>
                  </div>
                @else
                  
                @endif
                
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button 
          <li>
            <a href="{{ url('logout') }}" data-toggle="control-sidebar"><i class="fa fa-sign-out"></i></a>
          </li> -->
        </ul>
      </div>
    </nav>
  </header>