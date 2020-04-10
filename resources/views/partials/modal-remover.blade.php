
<div class="modal fade" id="deleteModal" tabindex="1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="deleteModalLabel">Confirmar Remocao</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p class="text-center text-bold">Tem certeza que deseja remover este registo?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Nao, volte</button>
				<button type="submit" class="btn btn-danger">Sim, remova</button>
			</div>
		</div>
	</div>
</div>
@section('scripts')
	<script>
		function handleDelete(id,route){
			$('#deleteModal').modal('show');
			var form = document.getElementById('deleteModalForm');
			form.action = '/' + route + '/' + id;
		}
	</script>
@endsection