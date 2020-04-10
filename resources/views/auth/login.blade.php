@extends('layouts.web')
@section('title')
	Website | Login
@endsection
@section('content')
	<div class="container h-100 mt-5">
		<div class="row h-100 justify-content-center align-items-center">
			<div class="col-md-4">
				<div class="text-center mb-6">
				    <h1 class="h1 font-weight-bold">Web site</h1>
				    <p class="text-secondary">O Slogan do website generico</p>
			  	</div>
			  	<form action="{{ route('entrar') }}" method="post">
			  	<div class="form-group">
			  		<label for="email"><strong>Email</strong></label>
			  		<input type="email" name="email" id="email" placeholder="exemplo@exemplo.com" class="form-control form-control-sm">
			  	</div>

			  	<div class="form-group">
			  		<label for="password"><strong>Senha</strong></label>
			  		<input type="password" name="password" id="password" placeholder="Sua senha" class="form-control form-control-sm">
			  	</div>

			  	<div class="form-check">
				    <input type="checkbox" class="form-check-input" id="lembre_se">
				    <label class="form-check-label" for="lembre_se">Lembre-se de mim</label>
				</div>
				<br>
				<div class="form-group">
			  		<button class="btn btn-md btn-info btn-block" type="submit"><strong>Entar</strong></button>
				</div>
				<br>
				@csrf
				</form>
			</div>
		</div>
	</div>
@endsection