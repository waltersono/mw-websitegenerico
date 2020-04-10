<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
  <a class="navbar-brand" href="{{ route('inicio') }}"><strong class="titulo-vermelho">NGOMA</strong></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto mx-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('inicio') }}"><strong>Inicio</strong> <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <strong>Categoria</strong>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><strong>Top 10</strong></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><strong>Artistas</strong></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><strong>Eventos</strong></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><strong>Noticia</strong></a>
      </li>
      @if(Auth::guest())
      <li class="nav-item">
        <a class="nav-link" href="{{ route('entrar') }}"><strong>Entrar</strong></a>
      </li>
      @else
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <strong>Minha Conta</strong>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('perfil') }}">Perfil</a>
        @if(Auth::user()->isMusico())
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{ route('albums.index') }}">Albums</a>
          <a class="dropdown-item" href="#">Musicas</a>
          <a class="dropdown-item" href="#">Eventos</a>
          <a class="dropdown-item" href="#">Comentarios</a>
          <a class="dropdown-item" href="#">Notificacoes</a>
          <div class="dropdown-divider"></div>
        @elseif(Auth::user()->isOperador())


        @elseif(Auth::user()->isAdmin())


        @endif
          <a class="dropdown-item" href="{{ route('logout') }}">Sair</a>
        </div>
      </li>
      @endif
  </div>
</nav>