<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{-- {{ config('app.name', 'Laravel') }} --}}
            
        </a>

        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            
            <ul class="navbar-nav">
               
                <li class="nav-item ">
                    
                    @if (request()->path() == '/')
                        <a class="nav-link" href="/"  style="color: #54123b; font-weight: 900;">Inicio</a>
                    @else
                        <a class="nav-link" href="/">Inicio</a>
                    @endif
                    
                </li>
                <li class="nav-item">
                    @if (request()->path() == 'quienes-somos')
                        <a class="nav-link" href="/quienes-somos" style="color: #54123b; font-weight: 600;">¿Quiénes Sómos?</a>
                    @else
                        <a class="nav-link" href="/quienes-somos">¿Quiénes Sómos?</a>
                    @endif
                </li>
                <li class="nav-item">
                    
                    @if (request()->path() == 'contactos/create')
                        <a class="nav-link" href=" {{ route('contactos.create') }} " style="color: #54123b; font-weight: 600;">Contáctenos</a>
                    @else
                        <a class="nav-link" href="{{ route('contactos.create') }}">Contáctenos</a>
                    @endif
                </li>
                

            </ul>
            
            @guest
                    
            @else
            

            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('citas.index') }}">Admin</a>
                </li>
                <li class="nav-item dropdown">
                    @if (request()->path() == 'porciones' 
                    || request()->path() == 'horas' 
                    || request()->path() == 'citas' 
                    || request()->path() == 'entrevistas' 
                    || request()->path() == 'contactos')
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #54123b; font-weight: 600;">
                            Ver
                        </a>
                    @else
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Ver
                        </a>
                    @endif
                    
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('porciones.index') }}">Lista de Porciones</a>
                        <a class="dropdown-item" href="{{ route('horas.index') }}">Lista de Horarios</a>
                        <a class="dropdown-item" href="{{ route('citas.index') }}">Lista de Citas</a>
                        {{-- <a class="dropdown-item" href="{{ route('pacientes.index') }}">Lista de Pacientes</a> --}}
                        <a class="dropdown-item" href="{{ route('entrevistas.index') }}">Lista de Entrevistas</a>
                        <a class="dropdown-item" href="{{ route('contactos.index') }}">Lista de Comentarios</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    @if (request()->path() == 'porciones/create' || request()->path() == 'citas/create' || request()->path() == 'horas/create' || request()->path() == 'planes/create')
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #54123b; font-weight: 600;">
                            Crear
                        </a>
                    @else
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Crear
                        </a>
                    @endif

                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('porciones.create') }}">Crear Porciones</a>
                        <a class="dropdown-item" href="{{ route('citas.create') }}">Crear Cita</a>
                        <a class="dropdown-item" href="{{ route('horas.create') }}">Crear Horario</a>
                        <a class="dropdown-item" href="{{ route('planes.create') }}">Crear Plan</a>
                        {{-- <a class="dropdown-item" href="{{ route('pacientes.create') }}">Crear Paciente</a> --}}
                    </div>
                </li>
                
            </ul>

            @endguest

            <ul class="navbar-nav">

                
            </ul>

            

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('registro.create') }}">{{ __('Registrarse') }}</a>
                            {{-- <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a> --}}
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out fa-sm fa-fw mr-2 text-gray-400"></i> {{ __('Salir') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest

                
            </ul>
        </div>
    </div>
</nav>