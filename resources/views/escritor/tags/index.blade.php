@extends('layouts.app_admin')
@section('title')
	Website Generico | Tag
@endsection
@section('content')
	<div class="card card-default">
		<div class="card-header">Tags
			<a href="{{ route('tags.create') }}" class="btn btn-success btn-sm float-right">Adicionar</a>
		</div>
		<div class="card-body">
			<table class="table">
				<thead>
					<th>Titulo</th>
					<th>Total Postagens</th>
					<th></th>
					<th></th>
				</thead>
				<tbody>
					@foreach($tags as $i)
						<tr>
							<td>{{ $i->titulo }}</td>
							<td class="text-center">{{ $i->posts->count() }}</td>
							<td>
								<a href="{{ route('tags.edit',$i->id) }}" class="btn btn-warning btn-sm">Editar</a>
							</td>
							<td>
								<form action="" method="POST" id="deleteModalForm">
									<button type="button" onclick="handleDelete({{ $i->id }},'tags')" class="btn btn-danger btn-sm">Remover</button>
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
