@extends('layouts.web')
@section('title')
Website Generico | Inicio
@endsection
@section('styles')
<link rel="stylesheet" href="{{ asset('src/css/footer.css') }}">
	<style>
		body{
			padding-bottom: 0;
		}
	</style>
@endsection
@section('content')
  @include('website.components.navbar')
  @include('website.components.carousel')
  <br>
  <div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<h1 class="h1 font-weight-bold">{{ $pagina->titulo }}</h1>
				<hr>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-md-8">
				{!! $pagina->conteudo !!}
			</div>
		</div>
  </div>
@include('website.components.footer')
  
@endsection
