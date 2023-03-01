@extends('front.app')

@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url({{asset('images/slide1.jpg')}});">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 ftco-animate text-center">
        <h1 class="mb-2 bread">@lang('Our Blog')</h1>
        <p class="breadcrumbs">
          <span class="mr-2"> <a href="{{ url('/')}}">@lang('Home')<i class="ion-ios-arrow-forward"></i></a></span>
          <span>@lang('Blog') <i class="ion-ios-arrow-forward"></i></span>
        </p>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section bg-light">
  <div class="container">
    @if(@isset($message))
    <div class="text-center heading-section ftco-animate d-flex justify-content-center posts-list">
      <h2 class="text-center">{{$message}} </h2>
    </div>
    @endif
    @if(@isset($title))
    <div class="text-center heading-section ftco-animate d-flex justify-content-center posts-list">
      <h2 class="text-center">{{$title}} </h2>
    </div>
    @endif
    @if(!@isset($message) && !@isset($title))
    <div class="text-center heading-section ftco-animate d-flex justify-content-center posts-list">
      <h2 class="text-center">@lang('Our Posts')</h2>
    </div>
    @endif
    @include('front.posts-section')
  </div>
</section>
@endsection