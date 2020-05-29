<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Universidad Distrital - Facultad de Medio Ambiente">
    <meta name="author" content="">
  
    <title>Prácticas de Campo</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
  
    <!-- Custom fonts for this template -->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

     <!-- Datepicker -->
    <link rel="stylesheet" href="{{asset('css/bootstrap-datepicker.css')}}">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet"> 

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tipsy/1.0.3/jquery.tipsy.css">
  </head>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
        margin-left: 25%;
        margin-right: 25%;
        margin-top: 2%;
        overflow: hidden;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 50%;
        widows: 60%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>
    <div id="wrapper" style="display: contents;">
      @if (Auth::user())
      {{-- <div id="map"></div> --}}
      <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

          <!-- Sidebar - Brand -->
          <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
            <div class="sidebar-brand-icon rotate-n-15">
              <i class="fas fa-map-marked-alt"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Prácticas de Campo</div>
          </a>

          <!-- Divider -->
          <hr class="sidebar-divider my-0">

          <!-- Nav Item - Dashboard -->
        
          @if(Auth::user()->adminPerm())
          
          <li class="nav-item">
              <a class="nav-link collapsed" href="#collapseOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                  <i class="fas fa-fw fa-user-cog"></i>
                  <span>Admin</span></a>
              </a>
              <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    {{-- <a class="collapse-item" href="{{route('users_index') }}">Listar Usuarios</a> --}}
                    <a class="collapse-item" href="{{url('users/filtrar/all') }}">Listar Usuarios</a>
                    <a class="collapse-item" href="{{url('register') }}">Nuevo Usuario</a>
                </div>
              </div>
            </li>
          
          <!-- Divider -->
          <hr class="sidebar-divider">
          
          @endif

          @if(Auth::user()->otrosPerm())
          <!-- Heading -->
          <div class="sidebar-heading">
            MÓDULOS
          </div>

          <!-- Nav Item - Pages Collapse Menu -->
          <li class="nav-item">
            <a class="nav-link collapsed" href="#collapseTwo" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              <i class="fas fa-fw fa-business-time"></i>
              <span>PROYECCIONES</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                {{-- <a class="collapse-item" href="{{route('proyeccion_index') }}">Listar Proyecciones</a> --}}
                <a class="collapse-item" href="{{url('proyecciones/filtrar/all') }}">Listar Proyecciones</a>
                @if(Auth::user()->admin() || Auth::user()->coordinador() || Auth::user()->docente())
                <a class="collapse-item" href="{{route('proyeccion_create')}}">Nueva Proyección</a>
                @endif
              </div>
            </div>
          </li>

          <!-- Nav Item - Pages Collapse Menu -->
          <li class="nav-item">
              <a class="nav-link collapsed" href="#collapseThree" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                <i class="fas fa-fw fa-clipboard-check"></i>
                <span>SOLICITUDES</span>
              </a>
              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                  {{-- <a class="collapse-item" href="{{route('solicitud_index')}}">Listar Solicitudes</a> --}}
                  {{-- <a class="collapse-item" href="{{route('index_codigo')}}">Consulta Código</a> --}}
                  @if(Auth::user()->admin() || Auth::user()->coordinador() || Auth::user()->docente())
                  <a class="collapse-item" href="">Nueva Solicitud</a>
                  @endif
                </div>
              </div>
            </li>

          
          @endif

          <!-- Divider -->
          <hr class="sidebar-divider">
          
          {{-- @endif --}}



        
          <!-- Sidebar Toggler (Sidebar) -->
          <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
          </div>

        </ul>
      <!-- End of Sidebar -->

        <div id="content-wrapper" class="d-flex flex-column">

          
          <!-- Main Content -->
          <div id="content" style="display: grid;">
            <div class="col-md-2 offset-md-10">
              <nav class="navbar navbar-expand-lg navbar-light bg-transp">
              {{-- <a href="{{ url('/') }}"><img src="{{ asset('img/Logo_Agrobolsa.png') }}" alt="" class="logo"/></a> 
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
              </button>--}}
              
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      
                      <ul class="navbar-nav mr-auto">
                      
                      @if (Auth::guest())
                          <li><a class="nav-link" href="{{ url('/login') }}" ><i class="icon-user"></i> Ingresar</a></li>
                      @else
                          
                      <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <span class="hidden-xs">{{ Auth::user()->usuario }}</span>
                          </a>
                          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="#">MENU</a>
                          <a class="dropdown-item" href="#">PERFIL</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="{{ url('/logout') }}" style="color: #090808"
                              onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                              SALIR
                          </a>
                          <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                  {{ csrf_field() }}
                                  <input type="submit" value="logout" style="display: none;">
                          </form>
                          </div>
                      </li>
                      @endif
          
                      </ul>
                  </div>
              </nav>
          </div>
          <!-- Main Content -->
            <div class="container-fluid">
              @if(Auth::user()->inactivo())
              @section('contenido')
                <div class="container-fluid">
                  <h6> Usuario Inactivo</h6>
              @endsection

              @else
              @section('contenido')
                <div class="container-fluid">

                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">First</th>
                      <th scope="col">Last</th>
                      <th scope="col">Handle</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>Mark</td>
                      <td>Otto</td>
                      <td>@mdo</td>
                    </tr>
                    <tr>
                      <th scope="row">2</th>
                      <td>Jacob</td>
                      <td>Thornton</td>
                      <td>@fat</td>
                    </tr>
                    <tr>
                      <th scope="row">3</th>
                      <td>Larry</td>
                      <td>the Bird</td>
                      <td>@twitter</td>
                    </tr>
                  </tbody>
                </table>
                {{-- <div>
                  <button class="btn btn-success" name="import_users" href="{{route('enviar_correo') }}">Enviar</button></a>
                </div> --}}
              @endsection
                
              @endif
                </div>
                </div>
            </div>
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
          </div>
        </div>
      {{-- </div> --}}
      </footer>
      <!-- End of Footer -->
      </div>
    
    </div>
    @endif
    <script>
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 4.7059636, lng: -73.4810535},
          zoom: 9
        });
      }
    </script>
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}" type="text/javascript"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}" type="text/javascript"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}" type="text/javascript"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}" type="text/javascript"></script>

    <!-- Page level demo scripts -->
    <script src="{{ asset('js/demo/chart-area-demo.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/demo/chart-pie-demo.js') }}" type="text/javascript"></script>

    <!-- datepicker scripts -->
    <script src="{{ asset('js/bootstrap-datepicker.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap-datepicker.es.js') }}" type="text/javascript"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAcxFB5k6kTgK_16HMqi_SlKkzHAHMzysQ&callback=initMap"
    async defer></script>
    <script src="{{ asset('js/custom.js') }}" type="text/javascript"></script>
  </body>
</html>
    {{-- <div id="map"></div> --}}
  
