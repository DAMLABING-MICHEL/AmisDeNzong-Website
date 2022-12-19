@extends('app')
@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url('/images/gallery-bg.jpg');">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<h1 class="mb-2 bread">Our Gallery</h1>
				<p class="breadcrumbs"><span class="mr-2"><a href="{{ url('/')}}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Gallery <i class="ion-ios-arrow-forward"></i></span></p>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section">
	<div class="container">
		<div class="d-flex justify-content-center">
			<div class="col-md-8 text-center heading-section ftco-animate">
				<div class="portfolio-menu mt-2 mb-4">
					<ul>
						<li class="btn btn-outline-danger active" data-filter="*">All</li>
						<li class="btn btn-outline-danger" data-filter=".kindergarden">Kindergarten</li>
						<li class="btn btn-outline-danger" data-filter=".elementary">Elementary</li>
						<li class="btn btn-outline-danger text" data-filter=".leisure">Leisure</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="portfolio-item row justify-content-center">
			@if(@isset($kinderImages))
			@foreach($kinderImages as $index=>$kinderImage)
			<div class="item kindergarden col-lg-3 col-md-4 col-6 col-sm">
				<a href="images/{{$kinderImage->url}}" class="fancylight popup-btn" data-fancybox-group="light">
					<img class="img-fluid" id="gallery-img" src="images/{{$kinderImage->url}}" alt="">
				</a>
			</div>
			@endforeach
			@endif
			@if(@isset($elementaryImages))
			@foreach($elementaryImages as $index=>$elementaryImage)
			<div class="item elementary col-lg-3 col-md-4 col-6 col-sm">
				<a href="images/{{$elementaryImage->url}}" class="fancylight popup-btn" data-fancybox-group="light">
					<img class="img-fluid" id="gallery-img" src="images/{{$elementaryImage->url}}" alt="">
				</a>
			</div>
			@endforeach
			@endif
			@if(@isset($leisureImages))
			@foreach($leisureImages as $index=>$leisureImage)
			<div class="item leisure col-lg-3 col-md-4 col-6 col-sm">
				<a href="images/{{$leisureImage->url}}" class="fancylight popup-btn" data-fancybox-group="light">
					<img class="img-fluid" id="gallery-img" src="images/{{$leisureImage->url}}" alt="">
				</a>
			</div>
			@endforeach
			@endif
		</div>
</section>
@endsection