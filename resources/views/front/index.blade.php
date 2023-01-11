@extends('front.app')
@section('content')

<section class="home-slider owl-carousel">
	<div class="slider-item" style="background-image: url(images/slide1.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
				<div class="col-md-8 text-center ftco-animate">
					<h1 class="mb-4">@lang('Primary Education') <span>@lang('English and Bilingual sections')</span></h1>
				</div>
			</div>
		</div>
	</div>

	<div class="slider-item" style="background-image: url(images/slide2.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
				<div class="col-md-8 text-center ftco-animate">
					<h1 class="mb-4">@lang('Kindergarten Education')<span>@lang('English and Bilingual sections')</span></h1>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-services ftco-no-pb">
	<div class="container-wrap">
		<div class="row no-gutters">
			<div class="col-md-3 d-flex services align-self-stretch pb-4 px-4 ftco-animate service1">
				<div class="media block-6 d-block text-center">
					<div class="icon d-flex justify-content-center align-items-center">
						<span class="flaticon-teacher"></span>
					</div>
					<div class="media-body p-2 mt-3">
						<h3 class="heading">@lang('Certified Teachers')</h3>
						<p>@lang('A dynamic, talented and experienced team of staff is here to take care of your children\'s education.')</p>
					</div>
				</div>
			</div>
			<div class="col-md-3 d-flex services align-self-stretch pb-4 px-4 ftco-animate service2">
				<div class="media block-6 d-block text-center">
					<div class="icon d-flex justify-content-center align-items-center">
						<span class="flaticon-reading"></span>
					</div>
					<div class="media-body p-2 mt-3">
						<h3 class="heading">@lang('Special Education')</h3>
						<p>@lang('The lessons are taught in French and English. The lessons also offers basic training in Italian language and computer science.')</p>
					</div>
				</div>
			</div>
			<div class="col-md-3 d-flex services align-self-stretch pb-4 px-4 ftco-animate service3">
				<div class="media block-6 d-block text-center">
					<div class="icon d-flex justify-content-center align-items-center">
						<span class="flaticon-books"></span>
					</div>
					<div class="media-body p-2 mt-3">
						<h3 class="heading">@lang('Environmental Quality')</h3>
						<p>@lang('School is in a clean, calm and secure area. Leisure activities are inside a secure environment.')</p>
					</div>
				</div>
			</div>
			<div class="col-md-3 d-flex services align-self-stretch pb-4 px-4 ftco-animate service4">
				<div class="media block-6 d-block text-center">
					<div class="icon d-flex justify-content-center align-items-center">
						<span class="flaticon-diploma"></span>
					</div>
					<div class="media-body p-2 mt-3">
						<h3 class="heading">@lang('why choose our Establishment?')</h3>
						<p>@lang('Emphasis is placed on the quality of education and the success of your children is our priority.')</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@include('front.welcome-section')

<section class="ftco-section">
	<div class="container">
		@include('front.images-section')
		<div class="text-center btn-gallery">
			<p><a href="{{ url('gallery')}}" class="btn px-4 py-3 mt-3 text-white">@lang('See more Gallery')</a></p>
		</div>
	</div>
</section>

@include('front.testimonials-section')


<section class="ftco-section bg-light">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8 text-center heading-section ftco-animate">
				<h2 class="mb-4"><span>@lang('Latest News')</span></h2>
				<p>@lang('Get informed about the activities of the Private Bilingual school group LAÏC "LES AMIS DE NZONG ET FONDATION CANDIA" by reading our different news')</p>
			</div>
		</div>
		@include('front.news-section')
		<div class="text-center">
			<p><a href="{{ url('news-events')}}" class="px-4 py-3 mt-3">@lang('See more News items') <span class="ion-ios-arrow-round-forward"></span></a></p>
		</div>
	</div>
</section>

<section class="ftco-section bg-light">
	<div class="container">
		<div class="row justify-content-center mb-5 pb-2">
			<div class="col-md-8 text-center heading-section ftco-animate">
				<h2 class="mb-4"><span>@lang('Recent Blog')</span></h2>
				<p>@lang('Find articles on several subjects concerning the Private Bilingual school group LAÏC "LES AMIS DE NZONG ET FONDATION CANDIA" and more')</p>
			</div>
		</div>
		@include('front.posts-section')
		<div class="text-center">
			<p><a href="{{ url('blog')}}" class="px-4 py-3 mt-3">@lang('See more Articles') <span class="ion-ios-arrow-round-forward"></span></a></p>
		</div>
	</div>
</section>

<section class="ftco-section bg-light">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8 text-center heading-section ftco-animate">
				<h2 class=""><span>@lang('Our Parteners')</span></h2>
			</div>
		</div>
		<div class="row justify-content-around">
			<div class="col-md-3 d-flex justify-content-center align-items-center">
				<a href="#"><img src="{{ asset('images/U2GICT.png')}}" alt="" class="u2g-image-size"></a>
			</div>
			<div class="col-md-3 d-flex justify-content-center align-items-center">
				<a href="#"><img src="{{ asset('images/fondation-candia.jpg')}}" class="fc-image-size" alt=""></a>
			</div>
			<div class="col-md-3 d-flex justify-content-center align-items-center">
				<a href="#"><img src="{{ asset('images/amis-de-nzong.png')}}" alt="" class="adn-image-size"></a>
			</div>
		</div>
	</div>
	</div>
</section>
@endsection