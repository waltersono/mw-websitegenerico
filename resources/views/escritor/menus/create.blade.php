@extends('layouts.app_admin')
@section('title')
	Website Generico | Pefil
@endsection
@section('content')
	<div class="card card-default">
		<div class="card-header">
			{{ isset($menu) ? 'Editar Menu' : 'Criar Menu' }}
		</div>
		<div class="card-body">
			<form action="{{ isset($menu) ? route('menus.update',$menu->id) : route('menus.store') }}" method="POST">
				<div class="form-group">
					<label for="posicao">Posicao</label>
					<input type="number" name="posicao" id="posicao" class="form-control form-control-sm"
					value="{{ isset($menu) ? $menu->posicao : ''}}">
				</div>
				<div class="form-group">
					<label for="titulo">Titulo</label>
					<input type="text" name="titulo" id="titulo" class="form-control form-control-sm"
					value="{{ isset($menu) ? $menu->titulo : ''}}">
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-info btn-sm">
					{{ isset($menu) ? 'Actualizar Menu' : 'Criar Menu' }}
					</button>
				</div>
				@csrf
				@if(isset($menu))
					@method('PUT')
				@endif
			</form>
		</div>
	</div>
@endsection