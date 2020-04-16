@extends('layouts.app_admin')
@section('title')
	Website Generico | Post
@endsection
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('src/css/trix.css') }}"/> 
@endsection
@section('content')
	<div class="card card-default">
		<div class="card-header">
			{{ isset($post) ? 'Editar Postagem' : 'Criar Postagem' }}
		</div>
		<div class="card-body">
			<form action="{{ isset($post) ? route('posts.update',$post->id) : route('posts.store') }}" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label for="pagina_id">Pagina</label>
					<select name="pagina_id" id="pagina_id" class="form-control form-control-sm">
						<option value="">-- Selecione um pagina --</option>
						@foreach($paginas as $i)
							<option value="{{ $i->id }}"
								@if(isset($post))
									@if($post->pagina_id == $i->id)
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
					value="{{ isset($post) ? $post->titulo : ''}}">
				</div>
				<div class="form-group">
					<label for="descricao">Descricao</label>
					<input type="text" name="descricao" id="descricao" class="form-control form-control-sm"
					value="{{ isset($post) ? $post->descricao : ''}}">
				</div>
				<div class="form-group">
					<label for="categoria_id">Categoria</label>
					<select name="categoria_id" id="categoria_id" class="form-control form-control-sm">
						<option value="">-- Selecione um categoria --</option>
						@foreach($categorias as $i)
							<option value="{{ $i->id }}"
								@if(isset($post))
									@if($post->categoria_id == $i->id)
										selected
									@endif
								@endif
								>{{ $i->titulo }}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="tag_id">Tags</label>
					<select name="tag_id[]" id="tag_id" class="form-control form-control-sm" multiple="true">
						<option value="">-- Selecione um tag --</option>
						@foreach($tags as $i)
							<option value="{{ $i->id }}"
								@if(isset($post))
									@if($post->hasTag($i->id))
										selected
									@endif
								@endif
								>{{ $i->titulo }}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="imagem">Imagem</label>
					@if(isset($post))
						<p class="text-center"><img src="{{ asset('storage/' . $post->imagem ) }}" width="30%" alt=""></p>
					@endif
					<input type="file" name="imagem" id="imagem" class="form-control form-control-sm">

				</div>
				<div class="form-group">
					<div class="form-group">
						<label for="conteudo">Conteudo</label>
						<input id="conteudo" type="hidden" name="conteudo" value="{{ isset($post) ? $post->conteudo : '' }}">
						<trix-editor input="conteudo">
							
						</trix-editor>
					</div>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-info btn-sm">
					{{ isset($post) ? 'Actualizar Postagem' : 'Criar Postagem' }}
					</button>
				</div>
				@csrf
				@if(isset($post))
					@method('PUT')
				@endif
			</form>
		</div>
	</div>
@endsection

@section('scripts')
    <script src="{{ asset('src/js/trix.js') }}"></script>
@endsection