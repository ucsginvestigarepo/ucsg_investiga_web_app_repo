<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>UCSG-Investiga</title>

  <!--Permite proteger nuestro proyecto de inyecciones para evitar bots -->
  <meta name="csrf-token" content="{{ csrf_token()}}">  

  <link rel="shortcut icon" href="{{asset('img/AppIconsUcsgInvestiga/AppIcon1024x1024.png')}}" />
  
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('assets/lte/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets/lte/bower_components/font-awesome/css/font-awesome.min.css')}}">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('assets/lte/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('assets/lte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/lte/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('assets/lte/dist/css/skins/_all-skins.min.css')}}">
  <!-- daterange picker -->
  <link rel="stylesheet" href="{{asset('assets/lte/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{asset('assets/lte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{asset('assets/lte/plugins/iCheck/all.css')}}">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="{{asset('assets/lte/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="{{asset('assets/lte/plugins/timepicker/bootstrap-timepicker.min.css')}}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('assets/lte/bower_components/select2/dist/css/select2.min.css')}}">
  
  
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<style type="text/css">
  .main-header a{
    background-color:darkblue !important;
  }
  .main-header .navbar{
    background-color:darkblue !important;
  }

  .main-sidebar .sidebar ul li:first-child{
     color: darkblue !important;
     font-size: 1.5em;
  }
  
 /* .main-sidebar .sidebar ul li:nth-child(even){
    background-color: lightblue !important;
    
  }*/

 /* .main-sidebar .sidebar ul li:nth-child(odd){
    background-color: darkgrey !important;
    
  }
*/
  .main-sidebar .sidebar ul li a:hover{
    background-color: cyan;
    color: black !important;
  }
</style>

<body class="hold-transition skin-red-light layout-fixed sidebar-mini skin-blue">
<!--<body class="hold-transition skin-black-light fixed sidebar-mini">-->
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Inicio Header-->
            @include('themes/lte/header')
        <!-- Fin Header -->
        <!-- Inicio Aside -->
            @include('themes/lte/asite')    
        <!-- Fin Aside -->
        

            <div class="content-wrapper ">

                    <!-- Content Header (Page header) -->
                    <section class="content-fluid">
                      <!--<h1>Proyecto Investiga - Universidad Católica Santiago de Guayaquil</h1>-->
  
                        @yield('titulo')                   
                        <div class="box">
                            <!--<p><h2>Universidad Católica de Santiago de Guayaquil - <strong>Concurso Investiga</strong></h2></p>-->
                            <div class="box-header with-border">
                                @yield('tituloForm')  
                      
                                <div class="box-tools pull-right">
                                  <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fa fa-minus"></i></button>
                                  
                                </div>
                              </div>
                              <div class="box-body">
                                  @yield('contenedor')
                              </div>
                              <!-- /.box-body -->
                              <div class="box-footer" style="color: #5e2129;font-weight: bold;">
                                Universidad Católica de Santiago de Guayaquil
                              </div>
                            
   
                        </div>
                 </section>
                 @include('themes/lte/politica')    
            </div>
    </div>

    <!-- jQuery 3 -->
    <script src="{{asset('assets/lte/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{asset('assets/lte/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- SlimScroll -->
    <script src="{{asset('assets/lte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('assets/lte/bower_components/fastclick/lib/fastclick.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('assets/lte/dist/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('assets/lte/dist/js/demo.js')}}"></script>
    <!-- date-range-picker -->
    <script src="{{asset('assets/lte/bower_components/moment/min/moment.min.js')}}"></script>
    <script src="{{asset('assets/lte/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <!-- bootstrap datepicker -->
    <script src="{{asset('assets/lte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
    <!-- DataTables -->
    <script src="{{asset('assets/lte/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/lte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <!-- InputMask -->
    <script src="{{asset('assets/lte/plugins/input-mask/jquery.inputmask.js')}}"></script>
    <script src="{{asset('assets/lte/plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
    <script src="{{asset('assets/lte/plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>
    <!-- page script -->
    <script src="{{asset('js/jquery.numeric.js')}}"></script>
    <script src="{{asset('js/combobox.js')}}"></script>
    <!-- HigCharts -->
    <script src="{{asset('code/highcharts.js')}}"></script>
    <script src=".{{asset('code/modules/exporting.js')}}"></script>
    <script src=".{{asset('code/modules/export-data.js')}}"></script>
    @yield('graficas')
   <script>
      $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
          'paging'      : false,
          'lengthChange': false,
          'searching'   : true,
          'ordering'    : false,
          'info'        : false,
          'autoWidth'   : false
        })
     })
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
          $('#cedula').numeric();
          $('#telefono').numeric();
          $('#celular').numeric();
          $('#decimal').numeric(","); 
      });
      </script>
    <script>
      $(function () {
       
        //Date picker
        $('#datepicker').datepicker({
           format: 'yyyy-mm-dd',
           autoclose: true
        })
        $('#datepicker2').datepicker({
          format: 'yyyy-mm-dd',
          autoclose: true
        })
        $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'dd/mm/yyyy' })

        })
     
    </script>
    <style type="text/css">
        .desplazamiento{
          overflow-x: auto;
          white-space: nowrap;
        }

        
        .fas, .far{
          margin-left: 0.5em;
          font-size: 4em;
          color: darkblue;
        }

        .fas-mini{
          font-size: 16px;
          color: darkblue;
        }

        .fas-mini-gray{
          margin-left: 0;
          font-size: 16px;
          color: black;
        }

        .sidebar-menu ul li{
          text-align: left;
        }

        .sidebar-menu ul li a{
          color: black !important;
          font-weight: bold;
          font-style: oblique;
          margin-left: 0.5em;
        }

      label{
          font-size: 1.5em;
          margin-left: 0.5em;
        }

        .form input{
          font-size: 1.2em;
        }

      .callout{
          background-color: darkblue !important;
          border: 1em black;
          border-radius: 0.5em;
        }

      .callout h4, .callout p {
        color: white !important;
      }

      img{
        max-width: 100%;
      }

      .box-body tr td{
        align-content: middle;
      }
    </style>
    <style type="text/css"> 
         @media screen and ( max-width: 1024px ) 
          { img.responsive {  width: 150px; } } 
        @media screen and ( min-width:1025px ) and ( max-width: 1280px ) 
          { img.responsive { width: 200px; } } 
        @media screen and ( min-width: 1081px ) 
          { img.responsive { width: 250px; } } img.responsive { height: auto; }
    </style>
</body>
@include('themes/lte/footer')
</html>