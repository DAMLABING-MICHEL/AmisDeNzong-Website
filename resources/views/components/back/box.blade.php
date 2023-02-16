@props([
  'type',
  'title',
  'number',
  'route',
  'model',
  'newtitle',
  'newnumber',
])

<div class="col-lg-3 col-6">
  <div class="small-box" id="{{ $type }}">
    <div class="inner">
      <h4 class="text-white">{{ __($title )}} : <span class="badge badge-light"> {{ $number }}</span></h4>
      <hr>
      @if(@isset($newtitle) && @isset($newnumber))
      <h5 class="text-white">{{ __($newtitle) }} : {{ __($newnumber) }}</h5>
      @endif
      <p></p>
    </div>
    <div class="icon">
      <i class="ion ion-bag"></i>
    </div>
    <a href="{{ route($route) }}" class="small-box-footer">@lang('More info') <i class="fas fa-arrow-circle-right"></i></a>
    <form action="{{ route('purge', $model) }}" method="POST">
      @csrf
      @method('PUT')
      <button type="submit" class="btn btn-{{ $type }} btn-block text-primary">@lang('Purge')</button>
    </form>
  </div>
</div>