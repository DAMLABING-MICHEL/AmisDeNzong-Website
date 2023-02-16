@props(['status'])

@if ($status)
<div class="row justify-content-center">
  <div class="alert alert-primary alert-dismissible fade show" role="alert">
    <span>{{ __($status )}}</span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
</div>
@endif