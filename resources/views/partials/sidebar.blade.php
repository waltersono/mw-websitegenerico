<ul class="list-group" id="sidebar">
	<li class="list-group-item list-group-item-light"><a href="{{ route('welcome') }}"><strong>Website Generico</strong></a></li>
	@if(auth()->user()->isAdmin())
		<li class="list-group-item list-group-item-action"><a href="{{ route('menus.index') }}">Menus</a></li>
		<li class="list-group-item list-group-item-action"><a href="{{ route('paginas.index') }}">Paginas</a></li>
		<li class="list-group-item"><a href="{{ route('users.index') }}">Usuarios</a></li>
		<li class="list-group-item"><a href="">Configuracoes</a></li>
	@else
		<li class="list-group-item list-group-item-action"><a href="">Categorias</a></li>
		<li class="list-group-item list-group-item-action"><a href="">Tags</a></li>
		<li class="list-group-item list-group-item-action"><a href="{{ route('postagens.index') }}">Postagens</a></li> 
	@endif
	<li class="list-group-item"><a href="{{ route('show-perfil-page') }}">Minha conta</a></li>
	<li class="list-group-item"><a href="{{ route('logout') }}">Sair</a></li>
</ul>