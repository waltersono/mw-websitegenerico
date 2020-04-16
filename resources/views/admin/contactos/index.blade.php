@extends('layouts.app_admin')
@section('title')
	Website Generico | Mensagens
@endsection
@section('content')
	<div class="card card-default">
		<div class="card-header">Mensagens</div>
		<div class="card-body">
			<table class="table">
				<thead>
					<th>OR</th>
					<th>Lida</th>
					<th>Email</th>
					<th>Assunto</th>
					<th>Accoes</th>
					<th></th>
				</thead>
				<tbody>
					@foreach($mensagens as $i)
						<tr>
							<td></td>
							<td>
								@if($i->lida == 0)
									<img src="{{ asset('src/img/star-on.png') }}"  width="20px" height="20px">
								@else
									<img src="{{ asset('src/img/star-off.png') }}" width="20px" height="20px">
								@endif
							</td>
							<td>{{ $i->email }}</td>
							<td>{{ $i->assunto }}</td>
							<td colspan="2">
								<a href="{{ route('contactos.show',$i->id) }}" class="btn btn-info btn-sm">Visualizar</a>
								<form action="" method="POST" id="deleteModalForm" style="display: inline;">
									<button type="button" onclick="handleDelete({{ $i->id }},'contactos')" class="btn btn-danger btn-sm">Remover</button>
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
