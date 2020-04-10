@if(Session::has('info'))
<div class="alert alert-info alert-dismissible fade show mt-2" role="alert">
  <strong>Informacao:</strong> {{ Session::get('info') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

