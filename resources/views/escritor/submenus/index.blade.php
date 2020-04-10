@extends('layouts.app_admin')
@section('title')
	Website Generico | Menu
@endsection
@section('content')
	<div class="card card-default">
		<div class="card-header">Submenus
			<a href="{{ route('submenus.create') }}" class="btn btn-success btn-sm float-right">Adicionar</a>
		</div>
		<div class="card-body">
			<table class="table">
				<thead>
					<th>Menu</th>
					<th>Posicao</th>
					<th>Titulo</th>
					<th>Total Paginas</th>
					<th>Total Posts</th>
					<th></th>
					<th></th>
				</thead>
				<tbody>
					@foreach($submenus as $i)
						<tr>
							<td>{{ $i->menu->titulo }}</td>
							<td>{{ $i->posicao }}</td>
							<td>{{ $i->titulo }}</td>
							<td class="text-center">{{ $i->paginas->count() }}</td>
							<td class="text-center">{{ $i->postagens->count() }}</td>
							<td>
								<a href="{{ route('submenus.edit',$i->id) }}" class="btn btn-warning btn-sm">Editar</a>
							</td>
							<td>
								<form action="" method="POST" id="deleteModalForm">
									<button type="button" onclick="handleDelete({{ $i->id }},'submenus')" class="btn btn-danger btn-sm">Remover</button>
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
