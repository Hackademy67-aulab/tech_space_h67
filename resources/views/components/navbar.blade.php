<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route('homePage')}}">TechSpaceH67</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="{{route('createProduct')}}">Crea prodotto</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('indexProduct')}}">Tutti i prodotti</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('createShop')}}">Crea negozio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('indexShop')}}">Tutti i negozi</a>
          </li>
          @auth
            <li class="nav-item">
              <a class="nav-link" href="{{route('userProfile')}}">Profilo utente</a>
            </li>
          @endauth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Registrazione
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              @guest
              <li><a class="dropdown-item" href="{{route('login')}}">Accedi</a></li>
              <li><a class="dropdown-item" href="{{route('register')}}">Registrati</a></li>
              @else
              <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">Logout</a></li>
              <form id="form-logout" method="POST" action="{{route('logout')}}" class="d-none">@csrf</form>
              @endguest
            </ul>
          </li>
        </ul>

        {{-- ERRORE COMUNE
        Ciao {{Auth::user()->name}} --}}

        {{-- @auth
          Ciao {{Auth::user()->name}}
        @else
          Ciao, accedi!    
        @endauth --}}

        @guest
          Ciao, accedi!
        @else
          Ciao {{Auth::user()->name}}
        @endguest
      </div>
    </div>
  </nav>