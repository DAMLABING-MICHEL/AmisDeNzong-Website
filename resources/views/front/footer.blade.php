<footer class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-6 col-lg-3">
                <div class="ftco-footer-widget mb-5">
                    <h2 class="ftco-heading-2">@lang('Have a Questions?')</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon icon-map-marker"></span><span class="text">@lang('BP.150 West Region, Menoua Dschang In Nzong-Foto Village, Cameroon')</span></li>
                            <li><a href="#"><span class="icon icon-phone"></span><span class="text">+237 65 71 83 89 / 693 03 44 72</span></a></li>
                            <li><a href="#"><span class="icon icon-envelope"></span><span class="text">contact@lesamisdenzong-fondationcandia.com</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="ftco-footer-widget mb-5">
                    @if(@isset($latestPosts))
                    <h2 class="ftco-heading-2">@lang('Recent Blog')</h2>
                    @foreach($latestPosts as $index=>$post)
                    <div class="block-21 mb-4 d-flex">
                        @if (!@empty($post->image))
                        <a class="blog-img mr-4" style="background-image: url(/images/{{$post->image->url}});"></a>
                        @endif
                        <div class="text">
                            <h3 class="heading"><a href="{{ url('blog-single/'.$post->slug) }}">{{$post->title}}</a></h3>
                            <div class="meta">
                                <div><a href="#"><span class="icon-calendar"></span> {{ strftime('%d %B %Y', strtotime($post->created_at)) }}</a></div>
                                <div><a href="#"><span class="icon-person"></span>{{$post->user->name}}</a>
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
                        <li><a href="{{url('/')}}"><span class="ion-ios-arrow-round-forward mr-2"></span>@lang('Home')</a></li>
                        <li><a href="{{url('about')}}"><span class="ion-ios-arrow-round-forward mr-2"></span>@lang('About')</a></li>
                        <li><a href="{{url('staff')}}"><span class="ion-ios-arrow-round-forward mr-2"></span>@lang('Staff')</a></li>
                        <li><a href="{{url('gallery')}}"><span class="ion-ios-arrow-round-forward mr-2"></span>@lang('Gallery')</a></li>
                        <li><a href="{{url('news-events')}}"><span class="ion-ios-arrow-round-forward mr-2"></span>@lang('News & Events')</a></li>
                        <li><a href="{{url('blog')}}"><span class="ion-ios-arrow-round-forward mr-2"></span>@lang('Blog')</a></li>
                        <li><a href="{{url('contact')}}"><span class="ion-ios-arrow-round-forward mr-2"></span>@lang('Contact')</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="ftco-footer-widget mb-5" id="newsletter-form">
                    <h2 class="ftco-heading-2">@lang('Subscribe Us!')</h2>
                    <form method="post" action="{{url('newsletter')}}" class="subscribe-form">
                        @csrf
                        <div class="form-group">
                            <input type="email" class="form-control mb-2 text-center" name="email" id="email" placeholder="Enter email address">
                            <div>
                                <p class="text-danger" id="email-error"></p>
                            </div>
                            <input type="submit" value="Subscribe" class="form-control submit px-3" id="subscribe">
                            <input type="button" value="Subscribing..." disabled class="form-control px-3" id="subscribing" hidden>
                        </div>
                    </form>
                </div>
                <div class="ftco-footer-widget mb-5">
                    <h2 class="ftco-heading-2 mb-0">@lang('Connect With Us')</h2>
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
                        <li class="ftco-animate"><a href="{{url('https://web.facebook.com/profile.php?viewas=100000686899395&id=100087234188812')}}" id="icon-facebook"><span class="icon-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="{{url('https://www.youtube.com/channel/UCmMGt83acprZhIKmvGH6WDw')}}" id="icon-youtube"><span class="icon-youtube"></span></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">

                <p>
                    @lang('Copyright') &copy;<script>
                        document.write(new Date().getFullYear());
                    </script>@lang(' All rights reserved')
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
{{-- <script src="{{url('https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false')}}"></script>  --}}
 {{-- <script src="{{asset('js/google-map.js')}}"></script> --}}
<script src="{{asset('js/main.js')}}"></script>
<script src="{{asset('js/scripts.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>