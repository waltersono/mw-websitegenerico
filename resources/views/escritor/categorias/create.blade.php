@extends('layouts.app_admin')
@section('title')
	Website Generico | {{ isset($categoria) ? 'Editar Categoria' : 'Criar Categoria' }}
@endsection
@section('content')
	<div class="card card-default">
		<div class="card-header">
			{{ isset($categoria) ? 'Editar Categoria' : 'Criar Categoria' }}
		</div>
		<div class="card-body">
			<form action="{{ isset($categoria) ? route('categorias.update',$categoria->id) : route('categorias.store') }}" method="POST">
				<div class="form-group">
					<label for="titulo">Titulo</label>
					<input type="text" name="titulo" id="titulo" class="form-control form-control-sm"
					value="{{ isset($categoria) ? $categoria->titulo : ''}}">
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-info btn-sm">
					{{ isset($categoria) ? 'Actualizar Categoria' : 'Criar Categoria' }}
					</button>
				</div>
				@csrf
				@if(isset($categoria))
					@method('PUT')
				@endif
			</form>
		</div>
	</div>
@endsection