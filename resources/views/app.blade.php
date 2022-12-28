<!DOCTYPE html>
<html lang="en">

@include('header')
<body>
    <div class="py-1 nav">
        <div class="container">
            <div class="row no-gutters d-flex align-items-start align-items-center px-3 px-md-0">
                <div class="col-lg-12 d-block">
                    <div class="row d-flex">
                        <div class="col-md-4 d-flex topper align-items-center">
                            <div class="icon bg-fifth mr-2 d-flex justify-content-center align-items-center text-white"><span class="icon-map"></span></div>
                            <span class="text text-white">@lang('BP.150 West Region, In Nzong-Foto Village')</span>
                        </div>
                        <div class="col-md-4 d-flex topper align-items-center">
                            <div class="icon bg-secondary mr-2 d-flex justify-content-center align-items-center text-white"><span class="icon-paper-plane"></span></div>
                            <span class="text text-white">contact@lesamisdenzong-fondationcandia.com</span>
                        </div>
                        <div class="col-md-3 d-flex topper align-items-center">
                            <div class="icon bg-tertiary mr-2 d-flex justify-content-center align-items-center text-white"><span class="icon-phone2"></span></div>
                            <span class="text text-white">+237 65 71 83 89 / 693 03 44 72</span>
                        </div>
                        <div class="class ml-4">
                            <div class="dropdown" style="display: inline-block;">
                                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink78" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{config('app.locale')}}</a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink78"> 
                                    @foreach(config('app.locales') as $locale)
                                    @if($locale != session('lang'))
                                    <a class="dropdown-item" href="{{ url('locale/'.$locale) }}">
                                        {{ $locale }}
                                    </a>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   @include('nav')
    @yield('content')

@include('footer')

</body>

</html>