<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          @if (Auth::check())
            @if (strlen(auth()->user()->rutaarchivo)>2)
              <img src="{{asset('storage/'.auth()->user()->rutaarchivo)}}" class="user-image" alt="User Image">

            @else
              <img src="{{asset('img/usuario.png')}}" class="user-image" alt="User Image"> 
            @endif
          @else
            <img src="{{asset('img/usuariono.png')}}" class="user-image" alt="User Image">
          @endif
        </div>
        <div class="pull-left info">
          @if (Auth::check())
            <p>{{ auth()->user()->name}}</p>
            <p><a href="#"><i class="fa fa-circle text-success"></i> Online</a></p>
          @else
            <p>N/A</p>
            <a href="#"><i class="fa fa-circle text-danger"></i> Offline</a>
          @endif
          
        </div>
      </div>
      @if (Auth::check())
          <ul class="sidebar-menu" data-widget="tree">
              
              <li class="header">MENU SISTEMA</li>
              @if (auth()->user()->idRol==1)
                 <li class="treeview">
                    <a href="#">
                      <i class="fa fa-cube"></i>
                      <span>Mantenimiento</span>
                      
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="{{ url('usuarios') }}"><i class="fas fa-user-circle fas-mini"></i> Usuarios</a></li>
                      <li><a href="{{ url('fases') }}"><i class="far fa-calendar-alt fas-mini"></i> Cronograma</a></li>
                      <li><a href="{{ url('dominio') }}"><i class="fas fa-clipboard-list fas-mini"></i> Dominios</a></li>
                      <li><a href="{{ url('estado') }}"><i class="fas fa-check-double fas-mini"></i> Estado</a></li>
                      <li><a href="{{ url('rol') }}"><i class="fas fa-users-cog fas-mini"></i> Roles</a></li>
                      <li><a href="{{ url('facultad') }}"><i class="fas fa-school fas-mini"></i> Facultades</a></li>
                      <li><a href="{{ url('carrera') }}"><i class="far fa-building fas-mini"></i> Carreras</a></li>
                    </ul>
                </li>
              @endif
              <li class="treeview">
                <a href="#">
                  <i class="fa fa-key"></i> <span>Seguridad</span>
                </a>
                <ul class="treeview-menu">
                     <li><a href="{{ url('usuarios/cambioclave') }}"><i class="fas fa-user-lock fas-mini"></i> Cambiar clave</a></li>
                    <li><a href="{{ url('usuarios/olvidoclave') }}"><i class="fas fa-lock-open fas-mini"></i> Recuperar clave</a></li>
              </ul>
              </li>
              @if (auth()->user()->idRol==5)
                <li class="treeview">
                    <a href="#">
                      <i class="fa fa-edit"></i> <span>Publicación</span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ url('publicacion') }}"><i class="far fa-file-alt fas-mini"></i> Registrar propuesta</a></li>
                    </ul>
                </li>
              @endif
              @if (auth()->user()->idRol==1)
                <li class="treeview">
                    <a href="#">
                      <i class="fa fa-file"></i> <span>Asignaciones</span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ url('asignaciones') }}"><i class="fas fa-file-signature fas-mini"></i> Registrar asignación</a></li>
                    </ul>
                </li>
              @endif
              @if (auth()->user()->idRol==3)
                <li class="treeview">
                    <a href="#">
                      <i class="fa fa-th-list"></i> <span>Gestión</span>
                      
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ url('gestion') }}"><i class="fas fa-tasks fas-mini"></i> Revisar propuestas</a></li>

                    </ul>
                </li>
              @endif
              @if (auth()->user()->idRol==2)
                <li class="treeview">
                   <a href="#">
                      <i class="far fa-edit fas-mini-gray"></i> <span>Calificación</span>

                    </a>
                    <ul class="treeview-menu">
                         <li><a href="{{ url('calificacion') }}"><i class="fas fa-list fas-mini"></i> Calificar propuestas</a></li>
                    </ul>
                </li>
              @endif
              @if (auth()->user()->idRol==1)
                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-trophy"></i> <span>Ganadores</span>
                    
                  </a>
                  <ul class="treeview-menu">
                      <li><a href="{{ url('ganadores') }}"><i class="far fa-list-alt fas-mini"></i> Lista de ganadores</a></li>
                  </ul>
                </li>
                <li class="treeview">
                      <a href="#">
                        <i class="fas fa-list-ol fas-mini-gray"></i> <span>Rankings</span>
                        
                      </a>
                      <ul class="treeview-menu">
                          <li><a href="{{ url('ranking') }}"><i class="far fa-list-alt fas-mini"></i> Ver puestos</a></li>
                      </ul>
                </li>
                
                <li class="treeview">
                    <a href="#">
                      <i class="fas fa-chart-pie fas-mini-gray"></i> <span>Estadisticas</span>
                      
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ url('estadistica') }}"><i class="fa fa-bar-chart fas-mini"></i> Revisar informes</a></li>
                    </ul>
                </li>
              @endif
              <li class="treeview">
                  <a href="#">
                    <i class="fa fa-book"></i> <span>Concurso</span>
                    
                  </a>
                  <ul class="treeview-menu">
                      <li><a href="{{ url('/documentos/NORMATIVA_CONCURSO.pdf') }}" target="_blank"><i class="far fa-file-pdf fas-mini"></i> Normativa</a></li>
                      <li><a href="{{ url('/documentos/PREMIOS_CONCURSO.pdf') }}" target="_blank"><i class="far fa-file-pdf fas-mini"></i> Premios</a></li>
                      <li><a href="{{ url('/documentos/FORMATO_CONCURSO.pdf') }}" target="_blank"><i class="far fa-file-pdf fas-mini"></i> Formato de reporte</a></li>
                      <li><a href="{{ url('/documentos/CALIFICACIONES_CONCURSO.pdf') }}" target="_blank"><i class="far fa-file-pdf fas-mini"></i> Calificaciones</a></li>
                  </ul>
              </li>
              @if (auth()->user()->idRol==1)
                <li class="treeview">
                    <a href="#">
                      <i class="fa fa-certificate"></i> <span>Certificados</span>
                      
                    </a>
                    <ul class="treeview-menu">
                         <li><a href="{{ url('certificado/gestoryrevisor') }}"><i class="far fa-file-pdf fas-mini"></i> Gen.Certif_GESTOR/REVISOR</a></li>
                         <li><a href="{{ url('certificado/profesor') }}"><i class="far fa-file-pdf fas-mini"></i> Gen.Certif_GANADOR</a></li>
                    </ul>
                </li>
              @endif
              <li class="treeview">
                  <a href="#">
                   <i class="fas fa-sign-out-alt fas-mini"></i> <span>Salir</span>
                    
                  </a>
                  <ul class="treeview-menu">
                      <li><a href="{{ url('logout') }}"><i class="fab fa-expeditedssl fas-mini"></i> Cerrar sesión</a></li>
                  </ul>
              </li>
              
          </ul>
             
              
      @endif
    
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>