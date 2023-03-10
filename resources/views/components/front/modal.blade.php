@props(['modal'])
@if ($modal)
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>@lang('thanks for subscribing to our newsletter!')</p>
        <p>@lang('we have sent you an email following your subscription')</p>
      </div>
    </div>
  </div>
</div>
@endif