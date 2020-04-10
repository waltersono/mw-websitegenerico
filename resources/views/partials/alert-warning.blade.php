@if(Session::has('warning'))
<div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
  <strong>Perigo:</strong> {{ Session::get('warning') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

