@extends('front.app')
@section('content')
<!-- END nav -->

<section class="hero-wrap hero-wrap-2" style="background-image: url('/images/about.jpg');">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<h1 class="mb-2 bread">About Us</h1>
				<p class="breadcrumbs"><span class="mr-2"><a href="{{ url('/')}}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>About us <i class="ion-ios-arrow-forward"></i></span></p>
			</div>
		</div>
	</div>
</section>

@include('front.welcome-section')

@include('front.testimonials-section')

@endsection