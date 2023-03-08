<!-- START nav -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco_navbar ftco-navbar-light" id="ftco-navbar">
    <div class="container d-flex align-items-center pt-2 pb-2">
        <a class="navbar-brand" href="{{ url('/')}}"><img src="{{ asset('images/Logo.jpg')}}" class="logo" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="{{ url('/')}}" class="nav-link pl-0"
                        id="{{ (request()->is('/')) ? 'active-link' : '' }}">@lang("Home")</a></li>
                <li class="nav-item"><a href="{{ url('about')}}" class="nav-link"
                        id="{{ (request()->is('about*')) ? 'active-link' : '' }}">@lang("About")</a></li>
                <li class="nav-item"><a href="{{ url('staff')}}" class="nav-link"
                        id="{{ (request()->is('staff*')) ? 'active-link' : '' }}">@lang("Staff")</a></li>
                <li class="nav-item"><a href="{{ url('gallery')}}" class="nav-link"
                        id="{{ (request()->is('gallery*')) ? 'active-link' : '' }}">@lang("Gallery")</a></li>
                <li class="nav-item"><a href="{{ url('news-events')}}" class="nav-link"
                        id="{{ (request()->is('news-events*')) ? 'active-link' : '' }}">@lang("News & Events")</a></li>
                <li class="nav-item"><a href="{{ url('blog')}}" class="nav-link"
                        id="{{ (request()->is('blog*')) ? 'active-link' : '' }}">@lang("Blog")</a></li>
                <li class="nav-item"><a href="{{ url('contact')}}" class="nav-link"
                        id="{{ (request()->is('contact*')) ? 'active-link' : '' }}">@lang("Contact")</a></li>
                <ul class="navbar-nav mr-auto">
                    @guest
                    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link ml-5"><span
                                class="log-link">@lang('Login')</span></a></li>
                    @request ('register')
                    <li class="nav-item"><a href="{{ request()->url() }}" class="nav-link ml-5"><span
                                class="log-link">@lang('Register')</span></a></li>
                    @endrequest
                    @request('forgot-password')
                    <li class="current nav-item">
                        <a href="{{ request()->url() }}" class="nav-link"
                            id="{{ (request()->is('forgot-password*')) ? 'active-link' : '' }}">@lang('Password')</a>
                    </li>
                    @endrequest
                    @request('reset-password/*')
                    <li class="current">
                        <a href="{{ request()->url() }}" class="nav-link "
                            id="{{ (request()->is('reset-password*')) ? 'active-link' : '' }}">@lang('Password')</a>
                    </li>
                    @endrequest

                    @else
                    @if(auth()->user()->role != 'user')
                    <li class="nav-item">
                        <a href="{{ url('admin') }}" class="nav-link">@lang('Administration')</a>
                    </li>
                    @endif
                    <div class="dropdown ml-4">
                        {{-- <img src="{{ getAvatar(auth()->user()) }}" alt="" style="width: 10%; height: 10%;"> --}}
                        <button class="btn dropdown-toggle" type="button" id="btn-user-name" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            @if(!@empty(auth()->user()->avatar))
                            <img src="{{ getAvatar(auth()->user()) }}" width="40" height="40" class="rounded-circle">
                            @endif
                            {{ auth()->user()->name }}
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ url('profile') }}"  id="profile-link">@lang('Profile')</a>
                            <li class="nav-item">
                                <form action="{{ route('logout') }}" method="POST" hidden>
                                    @csrf
                                </form>
                                <a href="{{ route('logout') }}" class="dropdown-item" id="logout-link"
                                    onclick="event.preventDefault(); this.previousElementSibling.submit();"><span>@lang('Logout')</span></a>
                            </li>
                        </div>
                    </div>
                    @endguest
                </ul>
        </div>
    </div>
</nav>
<!-- END nav -->