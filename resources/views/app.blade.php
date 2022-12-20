<!DOCTYPE html>
<html lang="en">

<head>
  <!-- <title>Groue Scolaire Bilingue Privé Laic "Les Amis De Nzong & Fondation Candia"</title> -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <x-meta title="Groue Scolaire Bilingue Privé Laic Les Amis De Nzong & Fondation Candia" image="{{ asset('images/logo.jpg') }}" />
  <!-- 
  <link href="{{url('https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900') }}" rel="stylesheet">
  <link href="{{ url('https://fonts.googleapis.com/css?family=Fredericka+the+Great') }}" rel="stylesheet"> -->

  <link rel="stylesheet" href="{{ asset('css/open-iconic-bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <link rel="stylesheet" href="{{asset('css/animate.css') }}">

  <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">

  <link rel="stylesheet" href="{{ asset('css/aos.css') }}">

  <link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}">

  <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
  <link rel="stylesheet" href="{{asset('css/icomoon.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
  <div class="py-2 nav">
    <div class="container">
      <div class="row no-gutters d-flex align-items-start align-items-center px-3 px-md-0">
        <div class="col-lg-12 d-block">
          <div class="row d-flex">
            <div class="col-md-4 d-flex topper align-items-center">
              <div class="icon bg-fifth mr-2 d-flex justify-content-center align-items-center text-white"><span class="icon-map"></span></div>
              <span class="text text-white">BP.150 West Region, In Nzong-Foto Village</span>
            </div>
            <div class="col-md-5 d-flex topper align-items-center">
              <div class="icon bg-secondary mr-2 d-flex justify-content-center align-items-center text-white"><span class="icon-paper-plane"></span></div>
              <span class="text text-white">contact@lesamisdenzong-fondationcandia.com</span>
            </div>
            <div class="col-md d-flex topper align-items-center">
              <div class="icon bg-tertiary mr-2 d-flex justify-content-center align-items-center text-white"><span class="icon-phone2"></span></div>
              <span class="text text-white">+237 65 71 83 89 / 693 03 44 72</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco_navbar ftco-navbar-light" id="ftco-navbar">
    <div class="container d-flex align-items-center pt-2 pb-2">
      <a class="navbar-brand" href="{{ url('/')}}"><img src="{{ asset('images/logo.jpg')}}" class="logo" alt=""></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>
      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="{{ url('/')}}" class="nav-link pl-0" id="{{ (request()->is('/')) ? 'active-link' : '' }}">@lang("Home")</a></li>
          <li class="nav-item"><a href="{{ url('about')}}" class="nav-link" id="{{ (request()->is('about*')) ? 'active-link' : '' }}">@lang("About")</a></li>
          <li class="nav-item"><a href="{{ url('staff')}}" class="nav-link" id="{{ (request()->is('staff*')) ? 'active-link' : '' }}">@lang("Staff")</a></li>
          <li class="nav-item"><a href="{{ url('gallery')}}" class="nav-link" id="{{ (request()->is('gallery*')) ? 'active-link' : '' }}">@lang("Gallery")</a></li>
          <li class="nav-item"><a href="{{ url('news-events')}}" class="nav-link" id="{{ (request()->is('news-events*')) ? 'active-link' : '' }}">@lang("News & Events")</a></li>
          <li class="nav-item"><a href="{{ url('blog')}}" class="nav-link" id="{{ (request()->is('blog*')) ? 'active-link' : '' }}">@lang("Blog")</a></li>
          <li class="nav-item"><a href="{{ url('contact')}}" class="nav-link" id="{{ (request()->is('contact*')) ? 'active-link' : '' }}">@lang("Contact")</a></li>
          <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" id="navbarDropdownFlag" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img width="32" height="32" alt="{{ session('locale') }}" src="{!! asset('images/flags/' . session('lang') . '-flag.png') !!}" />
              </a>
              <div id="flags" class="dropdown-menu" aria-labelledby="navbarDropdownFlag">
                @foreach(config('app.locales') as $locale)
                @if($locale != session('lang'))
                <a class="dropdown-item" href="{{ url('locale/'.$locale) }}">
                  <img width="32" height="32" alt="{{ session('lang') }}" src="{!! asset('images/flags/' . $locale . '-flag.png') !!}" />
                </a>
                @endif
                @endforeach
              </div>
            </li>
            @guest
            <li class="nav-item"><a href="{{ route('login') }}" class="nav-link ml-5"><span class="log-link">Login</span></a></li>
            @request ('register')
            <li class="nav-item"><a href="{{ request()->url() }}" class="nav-link ml-5"><span class="log-link">Register</span></a></li>
            @endrequest
            @request('forgot-password')
            <li class="current nav-item">
              <a href="{{ request()->url() }}" class="nav-link" id="{{ (request()->is('forgot-password*')) ? 'active-link' : '' }}">@lang('Password')</a>
            </li>
            @endrequest
            @request('reset-password/*')
            <li class="current">
              <a href="{{ request()->url() }}" class="nav-link " id="{{ (request()->is('reset-password*')) ? 'active-link' : '' }}">@lang('Password')</a>
            </li>
            @endrequest

            @else
            <div class="dropdown ml-4">
              <button class="btn dropdown-toggle" type="button" id="btn-user-name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ auth()->user()->name }}
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="{{ url('profile') }}">profile</a>
                <li class="nav-item">
                  <form action="{{ route('logout') }}" method="POST" hidden>
                    @csrf
                  </form>
                  <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); this.previousElementSibling.submit();"><span>Logout</span></a>
                </li>
              </div>
            </div>
            @endguest
          </ul>
      </div>
      <!-- <div class="sign-up-btn ml-5">
        <a href="#" class="text-center p-4 rounded text-white">Singn Up</a>
      </div> -->
    </div>
  </nav>
  <!-- END nav -->
  @yield('content')

  <footer class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md-6 col-lg-3">
          <div class="ftco-footer-widget mb-5">
            <h2 class="ftco-heading-2">Have a Questions?</h2>
            <div class="block-23 mb-3">
              <ul>
                <li><span class="icon icon-map-marker"></span><span class="text">BP.150 West Region, Menoua Dschang In Nzong-Foto Village, Cameroun</span></li>
                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+237 65 71 83 89 / 693 03 44 72</span></a></li>
                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">contact@lesamisdenzong-fondationcandia.com</span></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="ftco-footer-widget mb-5">
            @if(@isset($latestPosts))
            <h2 class="ftco-heading-2">Recent Blog</h2>
            @foreach($latestPosts as $index=>$post)
            <div class="block-21 mb-4 d-flex">
              <a class="blog-img mr-4" style="background-image: url(/images/{{$post->image->url}});"></a>
              <div class="text">
                <h3 class="heading"><a href="{{ url('/blog-single/'.$post->slug) }}">{{$post->title}}</a></h3>
                <div class="meta">
                  <!-- <div><a href="#"><span class="icon-calendar"></span> {{ $post->created_at->format('d-m-y') }}</a></div> -->
                  <div><a href="#"><span class="icon-calendar"></span> {{ strftime('%m %B %Y', strtotime($post->created_at)) }}</a></div>
                  <div><a href="#"><span class="icon-person"></span>{{$post->user->name}}</< /a>
                  </div>
                  @if($post->valid_comments_count)
                  <div><a href="#"><span class="icon-chat"></span> {{$post->valid_comments_count}}</a></div>
                  @endif
                </div>
              </div>
            </div>
            @endforeach
            @endif
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="ftco-footer-widget mb-5 ml-md-4">
            <h2 class="ftco-heading-2">Links</h2>
            <ul class="list-unstyled">
              <li><a href="{{url('/')}}"><span class="ion-ios-arrow-round-forward mr-2"></span>Home</a></li>
              <li><a href="{{url('about')}}"><span class="ion-ios-arrow-round-forward mr-2"></span>About</a></li>
              <li><a href="{{url('staff')}}"><span class="ion-ios-arrow-round-forward mr-2"></span>Staff</a></li>
              <li><a href="{{url('gallery')}}"><span class="ion-ios-arrow-round-forward mr-2"></span>Gallery</a></li>
              <li><a href="{{url('news-events')}}"><span class="ion-ios-arrow-round-forward mr-2"></span>News & Events</a></li>
              <li><a href="{{url('blog')}}"><span class="ion-ios-arrow-round-forward mr-2"></span>Blog</a></li>
              <li><a href="{{url('contact')}}"><span class="ion-ios-arrow-round-forward mr-2"></span>Contact</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="ftco-footer-widget mb-5" id="newsletter-form">
            <h2 class="ftco-heading-2">Subscribe Us!</h2>
            <form method="post" action="{{url('newsletter')}}" class="subscribe-form">
              @csrf
              <div class="form-group">
                <input type="text" class="form-control mb-2 text-center" name="email" id="email" placeholder="Enter email address">
                <div>
                  <p class="text-danger" id="email-error"></p>
                </div>
                <input type="submit" value="Subscribe" class="form-control submit px-3" id="subscribe">
              </div>
            </form>
          </div>
          <div class="ftco-footer-widget mb-5">
            <h2 class="ftco-heading-2 mb-0">Connect With Us</h2>
            <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
              <li class="ftco-animate"><a href="{{url('https://web.facebook.com/profile.php?viewas=100000686899395&id=100087234188812')}}"><span class="icon-facebook"></span></a></li>
              <li class="ftco-animate"><a href="{{url('https://www.youtube.com/channel/UCmMGt83acprZhIKmvGH6WDw')}}"><span class="icon-youtube"></span></a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 text-center">

          <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>
              document.write(new Date().getFullYear());
            </script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </p>
        </div>
      </div>
    </div>
  </footer>



  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
    </svg></div>

  <script src="{{asset('js/jquery.min.js')}}"></script>
  <script src="{{asset('js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{asset('js/popper.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <script src="{{asset('js/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('js/jquery.easing.1.3.js')}}"></script>
  <script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('js/jquery.stellar.min.js')}}"></script>
  <script src="{{asset('js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{asset('js/aos.js')}}"></script>
  <script src="{{asset('js/jquery.animateNumber.min.js')}}"></script>
  <script src="{{asset('js/scrollax.min.js')}}"></script>
  <!-- <script src="{{url('https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false')}}"></script> -->
  <!-- <script src="{{asset('js/google-map.js')}}"></script> -->
  <script src="{{asset('js/main.js')}}"></script>
  <script src="{{asset('js/scripts.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

</body>

</html>