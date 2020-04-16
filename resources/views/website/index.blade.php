@extends('layouts.web')
@section('title')
{{ $configuration->site_name }} | Inicio
@endsection
@section('styles')
	<link rel="stylesheet" href="{{ asset('src/css/footer.css') }}">
	<link rel="stylesheet" href="{{ asset('src/css/inicio.css') }}">
	<style>

		body{
			padding-bottom: 0;
			padding-top: 0;

		}
	</style>
@endsection
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="media mt-2 mb-1">
				  <img src="{{ asset('src/img/inas-logo.png') }}" width="20%" class="align-self-start mr-3" alt="...">
				  <div class="media-body">
				    <h1 class="mt-0 mb-0 font-weight-bold">{{ $configuration->site_name }}</h1>
				    <h4 class="mt-0 font-weight-bold">{{ $configuration->slogan }}</h4>
				  </div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="media mt-4">
				  <img src="{{ asset('src/img/phone.png') }}" width="15%" class="align-self-start mr-3" alt="...">
				  <div class="media-body">
				    <h6 class="mt-0 mb-0">+284 84 79 75 052</h6>
				    <h6 class="mt-0">Contacto</h6>
				  </div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="media mt-4">
				  <img src="{{ asset('src/img/location.png') }}" width="15%" class="align-self-start mr-3" alt="...">
				  <div class="media-body">
				    <h6 class="mt-0 mb-0">Av. Angola 2136</h6>
				    <h6 class="mt-0">
				    	Localizacao
				    </h6>
				  </div>
				</div>
			</div>
		</div>
		
	</div>
	
  @include('website.components.navbar')
  @include('website.components.carousel')
  @include('website.components.content')
  @include('website.components.footer')

@endsection