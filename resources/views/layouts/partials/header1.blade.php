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