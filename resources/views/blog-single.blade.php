@extends('app')
@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url(/images/blog-bg.jpg);">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 ftco-animate text-center">
        <h1 class="mb-2 bread">Blog Single</h1>
        <p class="breadcrumbs"><span class="mr-2"><a href="{{ url('/')}}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span class="mr-2"><a href="{{ url('/blog')}}">Blog <i class="ion-ios-arrow-forward"></i></a></span> <span>Blog Single <i class="ion-ios-arrow-forward"></i></span></p>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section">
  <div class="container">
    <div class="row">
      @if(@isset($post))
      <div class="col-lg-8 ftco-animate">
        <h2 class="mb-3">#{{$post->id}}. {{$post->title}}</h2>
        <p>{!! $post->summary !!}</p>
        <p>
          <img src="{{asset('images/'.$post->image->url)}}" alt="" class="img-fluid">
        </p>
        {!! $post->content !!}
        <div class="tag-widget post-tag-container mb-5 mt-5">
          @if(@isset($post))
          <div class="tagcloud">
            @if(@isset($post_tags))
            @foreach($post_tags as $index=>$post_tag)
            <a href="{{url('/blog/view-posts-by-tags/'.$post_tag->slug)}}" class="tag-cloud-link">{{ $post_tag->title}}</a>
            @endforeach
            @endif
          </div>
          @endif
        </div>

        <div class="about-author d-flex p-4 bg-light">
          <div class="bio mr-5">
            <img src="{{ Gravatar::get($post->user->email) }}" alt="Image placeholder" class="img-fluid mb-4">
          </div>
          <div class="desc">
            <h3>{{$post->user->name}}</h3>
            <p>{!! $post->user->description !!}</p>
          </div>
        </div>


        <div class="pt-5 mt-5" id="comments">
          <div id="commentsList">
            @if($post->valid_comments_count > 0)
            <div id="forShow">
              <p id="showbutton" class="text-center">
                <button id="showcomments" class="btn h-full-width">Show comments</button>
              </p>
              <p id="showicon" class="h-text-center" hidden>
                <span class="fa fa-spinner fa-pulse fa-3x fa-fw"></span>
              </p>
            </div>
            @else
            @if(Auth::guest())
            <span>You must be connected to add a comment. <a href="{{route('login')}}">login</a></span>
            @endif
            @endif
          </div>
          <p class="h-text-center" hidden>
            <input type="text" value="{{ $post->slug }}" id="postSlug">
          </p>
          <!-- END comment-list -->
          @if(Auth::check())
          <div class="comment-form-wrap pt-5">
            <h3 class="mb-5 h4 font-weight-bold">Leave a comment
              <span id="forName"></span>
              <span><a id="abort" hidden href="#">Abort reply</a></span>
            </h3>
            <div id="alert" class="alert-box" style="display: none">
              <p></p>
              <span class="alert-box__close"></span>
            </div>
            <form id="messageForm" method="post" action="#" class="p-5 bg-light">
              @csrf
              <input id="commentId" name="commentId" type="hidden" value="">
              <div class="form-group">
                <label for="message">Message</label>
                <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Post Comment" id="submit" name="send-comment" class="btn py-3 px-4 btn-primary">
              </div>
              <p id="commentIcon" class="h-text-center" hidden>
                <span class="fa fa-spinner fa-pulse fa-3x fa-fw"></span>
              </p>
            </form>
          </div>
          @endif
        </div>
      </div> <!-- .col-md-8 -->
      @endif

      <div class="col-lg-4 sidebar ftco-animate">
        <div class="sidebar-box">
          <form method="post" action="{{url('/blog/search-posts')}}" class="search-form">
            @csrf
            <div class="form-group">
              <input type="text" class="form-control" name="search" placeholder="Type a keyword and hit enter">
              <span class="icon icon-search"></span>
            </div>
          </form>
        </div>
        <div class="sidebar-box ftco-animate">
          <h3>Category</h3>
          @if(@isset($categories))
          <ul class="categories">
            @foreach($categories as $index=>$category)
            <li><a href="{{url('/blog/view-posts-by-categories/'.$category->slug)}}" class="category-link">{{$category->title}}
                @if(@isset($kinderPosts) && $category->title == "Kindergarden")
                <span>({{@count($kinderPosts)}})</span>
                @endif
                @if(@isset($primaryPosts) && $category->title == "Primary")
                <span>({{@count($primaryPosts)}})</span>
                @endif
                @if(@isset($leisurePosts) && $category->title == "Leisure")
                <span>({{@count($leisurePosts)}})</span>
                @endif
              </a></li>
            @endforeach
          </ul>
          @endif
        </div>

        <div class="sidebar-box ftco-animate">
          <h3>Latest Articles</h3>
          <div class="row">
            @if(@isset($lastPosts))
            @foreach($lastPosts as $index=>$post)
            <div class="block-21 mb-4 d-flex">
              <a class="blog-img mr-4" style="background-image: url(/images/{{$post->image->url}});"></a>
              <div class="text">
                <h3 class="heading"><a href="{{ url('/blog-single/'.$post->slug) }}">{{$post->title}}</a></h3>
                <div class="meta">
                  <!-- <div><a href="#"><span class="icon-calendar"></span> {{ $post->created_at->format('d-m-y') }}</a></div> -->
                  <div><a href="#"><span class="icon-calendar"></span> {{ strftime('%m %B %Y', strtotime($post->created_at)) }}</a></div>
                  <div><a href="#"><span class="icon-person"></span>{{$post->user->name}}</</a></div>
                  @if($post->valid_comments_count)
                  <div><a href="#"><span class="icon-chat"></span> {{$post->valid_comments_count}}</a></div>
                  @endif
                </div>
              </div>
            </div>
            @endforeach
            @endif
          </div>

          <div class="sidebar-box ftco-animate">
            <h3>Tag Cloud</h3>
            @if(@isset($tags))
            <ul class="tagcloud m-0 p-0">
              @foreach($tags as $index=>$tag)
              <a href="{{url('/blog/view-posts-by-tags/'.$tag->slug)}}" class="tag-cloud-link">{{$tag->title}}</a>
              @endforeach
            </ul>
            @endif
          </div>

          <div class="sidebar-box ftco-animate">
            <h3>Paragraph</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
          </div>
        </div><!-- END COL -->
      </div>
    </div>
</section>
@endsection