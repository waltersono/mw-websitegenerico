@extends('layouts.app_admin')
@section('title')
	Website Generico | Postagem
@endsection
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('src/css/trix.css') }}"/> 
@endsection
@section('content')
	<div class="card card-default">
		<div class="card-header">
			{{ isset($postagem) ? 'Editar Postagem' : 'Criar Postagem' }}
		</div>
		<div class="card-body">
			<form action="{{ isset($postagem) ? route('postagens.update',$postagem->id) : route('postagens.store') }}" method="POST">
				<div class="form-group">
					<label for="pagina_id">Pagina</label>
					<select name="pagina_id" id="pagina_id" class="form-control form-control-sm">
						<option value="">-- Selecione um pagina --</option>
						@foreach($paginas as $i)
							<option value="{{ $i->id }}"
								@if(isset($postagem))
									@if($postagem->pagina_id == $i->id)
										selected
									@endif
								@endif
								>{{ $i->titulo }}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="titulo">Titulo</label>
					<input type="text" name="titulo" id="titulo" class="form-control form-control-sm"
					value="{{ isset($postagem) ? $postagem->titulo : ''}}">
				</div>
				<div class="form-group">
					<div class="form-group">
						<label for="conteudo">Conteudo</label>
						<input id="conteudo" type="hidden" name="conteudo" value="{{ isset($postagem) ? $postagem->conteudo : '' }}">
						<trix-editor input="conteudo">
							
						</trix-editor>
					</div>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-info btn-sm">
					{{ isset($postagem) ? 'Actualizar Postagem' : 'Criar Postagem' }}
					</button>
				</div>
				@csrf
				@if(isset($postagem))
					@method('PUT')
				@endif
			</form>
		</div>
	</div>
@endsection

@section('scripts')
    <script src="{{ asset('src/js/trix.js') }}"></script>
@endsection