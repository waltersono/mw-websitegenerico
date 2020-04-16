<ul class="list-group" id="sidebar">
	<li class="list-group-item list-group-item-light"><a href="{{ route('welcome') }}"><strong>{{ $configuration->site_name }}</strong></a></li>
	@if(auth()->user()->isAdmin())
		
		<li class="list-group-item"><a href="{{ route('contactos.index') }}">Mensagens</a></li>
		<li class="list-group-item"><a href="{{ route('users.index') }}">Usuarios</a></li>
		<li class="list-group-item"><a href="{{ route('configurations.index') }}">Configuracoes</a></li>
	@else
		<li class="list-group-item list-group-item-action"><a href="{{ route('menus.index') }}">Menus</a></li>
		<li class="list-group-item list-group-item-action"><a href="{{ route('paginas.index') }}">Paginas</a></li>
		<li class="list-group-item list-group-item-action"><a href="{{ route('categorias.index') }}">Categorias</a></li>
		<li class="list-group-item list-group-item-action"><a href="{{ route('tags.index') }}">Tags</a></li>
		<li class="list-group-item list-group-item-action"><a href="{{ route('posts.index') }}">Postagens</a></li> 
	@endif
	<li class="list-group-item"><a href="{{ route('show-perfil-page') }}">Minha conta</a></li>
	<li class="list-group-item"><a href="{{ route('logout') }}">Sair</a></li>
</ul>