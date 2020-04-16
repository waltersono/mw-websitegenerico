@extends('layouts.web')
@section('title')
Website Generico | Contacte-nos
@endsection
@section('content')
@include('website.components.navbar')

<br>
<div class="container">
			@include('partials.alert-success')
            @include('partials.errors')
		<div class="row justify-content-center">
            
			<div class="col-md-8">
				<h1 class="h1 font-weight-bold">Contacte-nos</h1>
				<hr>
				<form action="{{ route('contactos.store') }}" method="post">
					<div class="form-group row">
					    <label for="email" class="col-sm-3 col-form-label"><strong>E-mail</strong></label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control form-control-sm" name="email" id="email" placeholder="Seu e-mail">
					    </div>
					</div>

					<div class="form-group row">
					    <label for="assunto" class="col-sm-3 col-form-label"><strong>Assunto</strong></label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control form-control-sm" name="assunto" id="assunto" 
					      placeholder="Assunto">
					    </div>
					</div>

					<div class="form-group row">
					    <label for="mensagem" class="col-sm-3 col-form-label"><strong>Mensagem</strong></label>
					    <div class="col-sm-9">
					      <textarea class="form-control form-control-sm" rows="10" name="mensagem" id="mensagem" placeholder="A mensagem"></textarea>
					    </div>
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-success btn-block btn-sm"><strong>
						Submeter mensagem</strong></button>
					</div>
					@csrf
				</form>
			</div>
		</div>	
	</div>
@endsection