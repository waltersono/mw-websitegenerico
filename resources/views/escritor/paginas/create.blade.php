@extends('layouts.app_admin')
@section('title')
	Website Generico | Pagina
@endsection
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('src/css/trix.css') }}"/> 
@endsection
@section('content')
	<div class="card card-default">
		<div class="card-header">
			{{ isset($pagina) ? 'Editar Pagina' : 'Criar Pagina' }}
		</div>
		<div class="card-body">
			<form action="{{ isset($pagina) ? route('paginas.update',$pagina->id) : route('paginas.store') }}" method="POST">
				<div class="form-group">
					<label for="menu_id">Menu</label>
					<select name="menu_id" id="menu_id" class="form-control form-control-sm">
						<option value="">-- Selecione um menu --</option>
						@foreach($menus as $i)
							<option value="{{ $i->id }}"
								@if(isset($pagina))
									@if($pagina->menu_id == $i->id)
										selected
									@endif
								@endif
								>{{ $i->titulo }}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="posicao">Posicao</label>
					<input type="number" name="posicao" id="posicao" class="form-control form-control-sm"
					value="{{ isset($pagina) ? $pagina->posicao : ''}}">
				</div>
				<div class="form-group">
					<label for="titulo">Titulo</label>
					<input type="text" name="titulo" id="titulo" class="form-control form-control-sm"
					value="{{ isset($pagina) ? $pagina->titulo : ''}}">
				</div>
				<div class="form-group">
					<div class="form-group">
						<label for="conteudo">Conteudo</label>
						<input id="conteudo" type="hidden" name="conteudo" value="{{ isset($pagina) ? $pagina->conteudo : '' }}">
						<trix-editor input="conteudo">
							
						</trix-editor>
					</div>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-info btn-sm">
					{{ isset($pagina) ? 'Actualizar Pagina' : 'Criar Pagina' }}
					</button>
				</div>
				@csrf
				@if(isset($pagina))
					@method('PUT')
				@endif
			</form>
		</div>
	</div>
@endsection

@section('scripts')
    <script src="{{ asset('src/js/trix.js') }}"></script>
@endsection