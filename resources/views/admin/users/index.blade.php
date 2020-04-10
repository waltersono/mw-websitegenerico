@extends('layouts.app_admin')
@section('title')
	Website Generico | Usuario
@endsection
@section('content')
	<div class="card card-default">
		<div class="card-header">Usuarios
			<a href="{{ route('users.create') }}" class="btn btn-success btn-sm float-right">Adicionar</a>
		</div>
		<div class="card-body">
			<table class="table">
				<thead>
					<th>Nome</th>
					<th>Email</th>
					<th>Perfil</th>
					<th></th>
					<th></th>
				</thead>
				<tbody>
					@foreach($users as $i)
						<tr>
							<td>{{ $i->name }}</td>
							<td>{{ $i->email }}</td>
							<td>{{ $i->perfil }}</td>
							<td>
								<a href="{{ route('users.edit',$i->id) }}" class="btn btn-warning btn-sm">Editar</a>
							</td>
							<td>
								<form action="" method="POST" id="deleteModalForm">
									<button type="button" onclick="handleDelete({{ $i->id }},'users')" class="btn btn-danger btn-sm">Remover</button>
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
