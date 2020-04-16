@extends('layouts.app_admin')
@section('title')
	Website Generico | {{ isset($tag) ? 'Editar Tag' : 'Criar Tag' }}
@endsection
@section('content')
	<div class="card card-default">
		<div class="card-header">
			{{ isset($tag) ? 'Editar Tag' : 'Criar Tag' }}
		</div>
		<div class="card-body">
			<form action="{{ isset($tag) ? route('tags.update',$tag->id) : route('tags.store') }}" method="POST">
				<div class="form-group">
					<label for="titulo">Titulo</label>
					<input type="text" name="titulo" id="titulo" class="form-control form-control-sm"
					value="{{ isset($tag) ? $tag->titulo : ''}}">
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-info btn-sm">
					{{ isset($tag) ? 'Actualizar Tag' : 'Criar Tag' }}
					</button>
				</div>
				@csrf
				@if(isset($tag))
					@method('PUT')
				@endif
			</form>
		</div>
	</div>
@endsection