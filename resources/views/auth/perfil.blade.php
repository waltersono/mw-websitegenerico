@extends('layouts.app_admin')
@section('title')
	Website Generico | Pefil
@endsection
@section('content')
	<div class="card card-default">
		<div class="card-header">Dashboard</div>
		<div class="card-body">
			<form action="{{ route('perfil.update') }}" method="POST">
				<div class="form-group">
					<label for="name">Nome</label>
					<input type="text" name="name" id="name" class="form-control form-control-sm" placeholder="Ze Joao" value="{{ $user->name }}">
				</div>
				
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" name="email" id="email" class="form-control form-control-sm" placeholder="exemplo@exemplo.com" value="{{ $user->email }}">
				</div>

				<div class="form-group">
					<button type="button" class="btn btn-dark btn-sm" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
				    Area de senha <span><i class="fas fa-arrow-down"></i></span>
				  	</button>
				</div>

				<div class="collapse" id="collapseExample">
				  <div class="card card-body">
				    <div class="form-group">
						<label for="old_password">Senha antiga</label>
						<input type="password" name="old_password" id="old_password" class="form-control form-control-sm">
					</div>
					<div class="form-group">
						<label for="password">Senha</label>
						<input type="password" name="password" id="password" class="form-control form-control-sm">
					</div>
					<div class="form-group">
						<label for="password_confirmation">Confirmar Senha</label>
						<input type="password" name="password_confirmation" id="password_confirmation" class="form-control form-control-sm">
					</div>
				  </div>
				</div>
				
				<div class="form-group mt-2">
					<button type="submit" class="btn btn-info btn-sm">Actualizar</button>
				</div>
				@csrf
			</form>
		</div>
	</div>
@endsection