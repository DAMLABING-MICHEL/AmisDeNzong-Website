@extends('app')

@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url('/images/blog-bg.jpg');">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 ftco-animate text-center">
        <h1 class="mb-2 bread">@lang('Our Blog')</h1>
        <p class="breadcrumbs"><span class="mr-2"><a href="{{ url('/')}}">@lang('Home') <i class="ion-ios-arrow-forward"></i></a></span> <span>@lang('Blog') <i class="ion-ios-arrow-forward"></i></span></p>
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
      <h2 class="text-center">Our Posts</h2>
    </div>
    @endif
    <div class="row justify-content-center">
      @if(@isset($posts))
      @foreach($posts as $index=>$post)
      <div class="col-md-6 col-lg-4 ftco-animate">
        <div class="blog-entry">
          @if(@isset($post->image) && !@empty($post->image))
          <a href="{{ url('blog-single/'. $post->slug)}}" class="block-20 d-flex align-items-end" style="background-image: url('/images/{{$post->image->url}}');">
            <div class="meta-date text-center p-2">
              <span class="day">{{ strftime('%m', strtotime($post->created_at)) }} </span>
              <span class="mos">{{ strftime('%B', strtotime($post->created_at)) }}</span>
              <span class="yr">{{ strftime('%Y', strtotime($post->created_at)) }}</span>
            </div>
          </a>
          @endif
          <div class="text bg-white p-4">
            <h3 class="heading"><a href="#">{{$post->title}}</a></h3>
            <p>{{$post->summary}}</p>
            <div class="d-flex align-items-center mt-4">
              <p class="mb-0"><a href="{{ url('blog-single/'.$post->slug) }}" class="btn">@lang('Read More')<span class="ion-ios-arrow-round-forward"></span></a></p>
              <p class="ml-auto mb-0">
                <span class="mr-2 blog-username">{{$post->user->name}}</span>
                @if($post->valid_comments_count)
                <span class="meta-chat blog-username"><span class="icon-chat"></span>{{$post->valid_comments_count}}</span>
                @endif
              </p>
            </div>
          </div>
        </div>
      </div>
      @endforeach
      @endif

      @if(isset($postsByCategory) && !@empty($postsByCategory))
      @foreach($postsByCategory as $index=>$post)
      <div class="col-md-6 col-lg-4 ftco-animate">
        <div class="blog-entry">
          @if(@isset($post->image) && !@empty($post->image))
          <a href="{{ url('blog-single/'. $post->slug)}}" class="block-20 d-flex align-items-end" style="background-image: url('/images/{{$post->image->url}}');">
            <div class="meta-date text-center p-2">
              <span class="day">{{ strftime('%m', strtotime($post->created_at)) }} </span>
              <span class="mos">{{ strftime('%B', strtotime($post->created_at)) }}</span>
              <span class="yr">{{ strftime('%Y', strtotime($post->created_at)) }}</span>
            </div>
          </a>
          @endif
          <div class="text bg-white p-4">
            <h3 class="heading"><a href="#">{{$post->title}}</a></h3>
            <p>{{$post->summary}}</p>
            <div class="d-flex align-items-center mt-4">
              <p class="mb-0"><a href="{{ url('blog-single/'.$post->slug) }}" class="btn">@lang('Read More')<span class="ion-ios-arrow-round-forward"></span></a></p>
              <p class="ml-auto mb-0">
                <span class="mr-2 blog-username">{{$post->user->name}}</span>
                @if($post->valid_comments_count)
                <span class="meta-chat"><span class="icon-chat"></span>{{$post->valid_comments_count}}</span>
                @endif
              </p>
            </div>
          </div>
        </div>
      </div>
      @endforeach
      @endif

      @if(isset($postsByTag) && !@empty($postsByTag))
      @foreach($postsByTag as $index=>$post)
      <div class="col-md-6 col-lg-4 ftco-animate">
        <div class="blog-entry">
          @if(@isset($post->image) && !@empty($post->image))
          <a href="{{ url('blog-single/'. $post->slug)}}" class="block-20 d-flex align-items-end" style="background-image: url('/images/{{$post->image->url}}');">
            <div class="meta-date text-center p-2">
              <span class="day">{{ strftime('%m', strtotime($post->created_at)) }} </span>
              <span class="mos">{{ strftime('%B', strtotime($post->created_at)) }}</span>
              <span class="yr">{{ strftime('%Y', strtotime($post->created_at)) }}</span>
            </div>
          </a>
          @endif
          <div class="text bg-white p-4">
            <h3 class="heading"><a href="#">{{$post->title}}</a></h3>
            <p>{{$post->summary}}</p>
            <div class="d-flex align-items-center mt-4">
              <p class="mb-0"><a href="{{ url('/blog-single/'.$post->slug) }}" class="btn">@lang('Read More')<span class="ion-ios-arrow-round-forward"></span></a></p>
              <p class="ml-auto mb-0">
                <span class="mr-2 blog-username">{{$post->user->name}}</span>
                @if($post->valid_comments_count)
                <span class="meta-chat blog-username"><span class="icon-chat"></span>{{$post->valid_comments_count}}</span>
                @endif
              </p>
            </div>
          </div>
        </div>
      </div>
      @endforeach
      @endif

      @if(isset($searchPosts) && !@empty($searchPosts))
      @foreach($searchPosts as $index=>$post)
      <div class="col-md-6 col-lg-4 ftco-animate">
        <div class="blog-entry">
          @if(@isset($post->image) && !@empty($post->image))
          <a href="{{ url('blog-single/'. $post->slug)}}" class="block-20 d-flex align-items-end" style="background-image: url('/images/{{$post->image->url}}');">
            <div class="meta-date text-center p-2">
              <span class="day">{{ strftime('%m', strtotime($post->created_at)) }} </span>
              <span class="mos">{{ strftime('%B', strtotime($post->created_at)) }}</span>
              <span class="yr">{{ strftime('%Y', strtotime($post->created_at)) }}</span>
            </div>
          </a>
          @endif
          <div class="text bg-white p-4">
            <h3 class="heading"><a href="#">{{$post->title}}</a></h3>
            <p>{{$post->summary}}</p>
            <div class="d-flex align-items-center mt-4">
              <p class="mb-0"><a href="{{ url('blog-single/'.$post->slug) }}" class="btn">@lang('Read More')<span class="ion-ios-arrow-round-forward"></span></a></p>
              <p class="ml-auto mb-0">
                <span class="mr-2 blog-username">{{$post->user->name}}</span>
                @if($post->valid_comments_count)
                <span class="meta-chat"><span class="icon-chat"></span>{{$post->valid_comments_count}}</span>
                @endif
              </p>
            </div>
          </div>
        </div>
      </div>
      @endforeach
      @endif
    </div>
  </div>
</section>
@endsection