@props(['errors'])

@if($errors->any())
<div class="row justify-content-center">
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <div style="padding-bottom:1rem">@lang('Whoops! Something went wrong.')</div>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ __($error) }}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
@endif