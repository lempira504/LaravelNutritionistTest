<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
    
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
    
            </ul>
    
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/">Inicio</a>
                </li>
    
                <li class="nav-item">
                    <a class="nav-link" href="/quienes-somos">Quienes Somos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contacto">Contactenos</a>
                </li>
                @guest
    
                {{-- <li class="nav-item">
                    <a class="nav-link" href="/quienes-somos">Quienes Somos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contacto">Contactenos</a>
                </li> --}}
                @else
                {{-- <li class="nav-item">
                            <a class="nav-link" href="/citas">Citas</a>
                        </li> --}}
                @endguest
    
            </ul>
    
            @guest
    
            @else
            {{-- <ul class="navbar-nav">
    
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Citas
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="/citas/">Lista de Citas</a>
                        <a class="dropdown-item" href="/citas/create">Crear cita</a>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav">
    
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Planes
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="/plans/">Lista de Planes</a>
                        <a class="dropdown-item" href="planes.show">Crear Plan</a>
                    </div>
                </li>
            </ul> --}}
    
            <ul class="navbar-nav">
    
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Ver
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('porciones.index') }}">Lista de Porciones</a>
                        <a class="dropdown-item" href="{{ route('horas.index') }}">Lista de Horarios</a>
                        <a class="dropdown-item" href="{{ route('citas.index') }}">Lista de Citas</a>
                        {{-- <a class="dropdown-item" href="{{ route('pacientes.index') }}">Lista de Pacientes</a> --}}
                        <a class="dropdown-item" href="{{ route('entrevistas.index') }}">Lista de Entrevistas</a>
                    </div>
                </li>
            </ul>
    
            <ul class="navbar-nav">
    
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Crear
                    </a>
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
    
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
    
                <!-- Authentication Links -->
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
    
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
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