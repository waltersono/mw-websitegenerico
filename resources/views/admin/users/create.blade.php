@extends('layouts.app_admin')
@section('title')
	Website Generico | Editar Usuario
@endsection
@section('content')
	<div class="card card-default">
		<div class="card-header">
			{{ isset($user) ? 'Editar Usuario' : 'Criar Usuario' }}
		</div>
		<div class="card-body">
			<form action="{{ isset($user) ? route('users.update',$user->id) : route('users.store') }}" method="POST">
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" name="name" id="name" class="form-control form-control-sm"
					value="{{ isset($user) ? $user->name : ''}}">
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" name="email" id="email" class="form-control form-control-sm"
					value="{{ isset($user) ? $user->email : ''}}">
				</div>
				<div class="form-group">
					<label for="perfil">Perfil</label>
					<select name="perfil" id="perfil" class="form-control form-control-sm">
						<option value="Escritor"
						@if(isset($user))
							@if($user->perfil == 'Escritor') 
								selected
							@endif
						@endif
						>Escritor</option>
						<option value="Administrador"
						@if(isset($user))
							@if($user->perfil == 'Administrador') 
								selected 
							@endif
						@endif
						>Administrador</option>
					</select>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-info btn-sm">
					{{ isset($user) ? 'Actualizar Usuario' : 'Criar Usuario' }}
					</button>
				</div>
				@csrf
				@if(isset($user))
					@method('PUT')
				@endif
			</form>
		</div>
	</div>
@endsection