@extends('layouts.app_admin')
@section('title')
	Website Generico | Configurations
@endsection
@section('content')
	<div class="card card-default">
		<div class="card-header">Dashboard</div>
		<div class="card-body">
			<form action="{{ route('configurations.update',$configuration->id) }}" method="POST">
				<div class="form-group">
					<label for="site_name">Nome do site</label>
					<input type="text" name="site_name" id="site_name" class="form-control form-control-sm" value="{{ $configuration->site_name }}">
				</div>
				
				<div class="form-group">
					<label for="slogan">Slogan</label>
					<input type="slogan" name="slogan" id="slogan" class="form-control form-control-sm" value="{{ $configuration->slogan }}">
				</div>
				
				<div class="form-group mt-2">
					<button type="submit" class="btn btn-info btn-sm">Actualizar</button>
				</div>
				@csrf
				@method('PUT')
			</form>
		</div>
	</div>
@endsection