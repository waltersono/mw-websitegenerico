@if(Session::has('success'))
<div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
  <strong>Sucesso:</strong> {{ Session::get('success') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

