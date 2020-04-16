@extends('layouts.app_admin')
@section('title')
	Website Generico | Pagina
@endsection
@section('content')
	<div class="card card-default">
		<div class="card-header">
			Mensagem
		</div>
		<div class="card-body">
			<p>
				<strong>Email:</strong>
				<span>{{ $mensagem->email }}</span>
			</p>
			<p>
				<strong>Assunto:</strong>
				<span>{{ $mensagem->assunto }}</span>
			</p>
			<p>
				<strong>Mensagem: </strong>
				<p>{{ $mensagem->mensagem }}</p>
			</p>
			
		</div>
	</div>
@endsection
