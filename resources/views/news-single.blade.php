@extends('app')
@section('content')

<section class="hero-wrap hero-wrap-2" style="background-image: url('/images/news-events.jpg');">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 ftco-animate text-center">
        <h1 class="mb-2 bread">News Single</h1>
        <p class="breadcrumbs"><span class="mr-2"><a href="{{url('/')}}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span class="mr-2"><a href="{{url('/news-events')}}">News & Events <i class="ion-ios-arrow-forward"></i></a></span> <span>News Single <i class="ion-ios-arrow-forward"></i></span></p>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 ftco-animate">
        @if(@isset($newsSingle))
        <h2 class="mb-3">#{{$newsSingle->id}}. {{$newsSingle->title}}</h2>
        <p>
          <img src="{{asset('images/'.$newsSingle->image->url)}}" alt="" class="img-fluid">
        </p>
        <p>{{$newsSingle->content}}</p>
        @endif
      </div> <!-- .col-md-8 -->

      <div class="col-lg-4 sidebar ftco-animate">

        <div class="sidebar-box ftco-animate">
          <h3>Recent News</h3>
          @if(@isset($lattestNews))
          @foreach($lattestNews as $index=>$newsSingle)
          <div class="block-21 mb-4 d-flex">
            <a class="blog-img mr-4" style="background-image: url(/images/{{$newsSingle->image->url}});"></a>
            <div class="text">
              <h3 class="heading"><a href="{{url('news-single/'.$newsSingle->id)}}">{{$newsSingle->title}}</a></h3>
              <div class="meta">
                <div><a href="#"><span class="icon-calendar"></span> {{$newsSingle->created_at}}</a></div>
              </div>
            </div>
          </div>
          @endforeach
          @endif
        </div>
      </div><!-- END COL -->
    </div>
  </div>
</section>
@endsection