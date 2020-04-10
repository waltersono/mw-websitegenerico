@extends('layouts.app_admin')
@section('title')
	Website Generico | Pefil
@endsection
@section('content')
	<div class="card card-default">
		<div class="card-header">
			{{ isset($submenu) ? 'Editar Submenu' : 'Criar Submenu' }}
		</div>
		<div class="card-body">
			<form action="{{ isset($submenu) ? route('submenus.update',$submenu->id) : route('submenus.store') }}" method="POST">
				<div class="form-group">
					<label for="menu_id">Menu</label>
					<select name="menu_id" id="menu_id" class="form-control form-control-sm">
						<option value="">-- Selecione um menu --</option>
						@foreach($menus as $i)
							<option value="{{ $i->id }}"
								@if(isset($submenu))
									@if($submenu->menu_id == $i->id)
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
					value="{{ isset($submenu) ? $submenu->posicao : ''}}">
				</div>
				<div class="form-group">
					<label for="titulo">Titulo</label>
					<input type="text" name="titulo" id="titulo" class="form-control form-control-sm"
					value="{{ isset($submenu) ? $submenu->titulo : ''}}">
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-info btn-sm">
					{{ isset($submenu) ? 'Actualizar Submenu' : 'Criar Submenu' }}
					</button>
				</div>
				@csrf
				@if(isset($submenu))
					@method('PUT')
				@endif
			</form>
		</div>
	</div>
@endsection