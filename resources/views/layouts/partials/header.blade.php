<header>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">jSecretarios</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">

                    @if (Auth::check())

                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Inicio</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Perfil</a>
                        </li>

                        @if (isAdmin())
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('admin') }}">Admin</a>
                            </li>
                        @endif

                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('logout') }}">Cerrar sesion</a>
                        </li>
                    @endif                
                    
                    
                </ul>
            </div>
        </div>
    </nav>
</header>