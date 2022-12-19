@props(['unsubscribe'])
@if ($unsubscribe)
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>{{$unsubscribe}}</p>
        <p>has been unsubscribed from AmisDeNzong. Sorry to see you go!</p>
      </div>
    </div>
  </div>
</div>
@endif