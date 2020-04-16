@extends('layouts.app_admin')
@section('title')
	Website Generico | Postagens
@endsection
@section('content')
	<div class="card card-default">
		<div class="card-header">Postagens
			<a href="{{ route('posts.create') }}" class="btn btn-success btn-sm float-right">Adicionar</a>
		</div>
		<div class="card-body">
			<table class="table">
				<thead>
					<th>Pagina</th>
					<th>Titulo</th>
					<th></th>
					<th></th>
				</thead>
				<tbody>
					@foreach($posts as $i)
						<tr>
							<td>{{ $i->pagina->titulo }}</td>
							<td>{{ $i->titulo }}</td>
							<td>
								<a href="{{ route('posts.edit',$i->id) }}" class="btn btn-warning btn-sm">Editar</a>
							</td>
							<td>
								<form action="" method="POST" id="deleteModalForm">
									<button type="button" onclick="handleDelete({{ $i->id }},'posts')" class="btn btn-danger btn-sm">Remover</button>
									@include('partials.modal-remover')
									@csrf
									@method('DELETE')
								</form>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection
