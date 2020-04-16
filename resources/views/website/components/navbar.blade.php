<header>
      <nav class="navbar navbar-expand-md navbar-success  bg-success">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link text-light" href="/">Home <span class="sr-only">(current)</span></a>
              </li>
            @foreach($menus as $menu)
              @if($menu->paginas->count() > 0)
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ $menu->titulo }}
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @foreach($menu->paginas->sortBy('posicao') as $pagina)
                      <a class="dropdown-item" href="{{ route('show-pagina',$pagina->id) }}">{{ $pagina->titulo }}</a>
                    @endforeach
                  </div>
                </li>
              @else
                <li class="nav-item">
                  <a class="nav-link text-light" href="#">{{ $menu->titulo }}</a>
                </li>
              @endif
            @endforeach
            <li class="nav-item">
                <a class="nav-link text-light" href="{{ route('contactos.create') }}">Contacte-nos</a>
              </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Coronavirus</button>
          </form>
        </div>
      </nav>
    </header>
<style>
    nav{
      border-top: 5px solid yellow;
    }
</style>