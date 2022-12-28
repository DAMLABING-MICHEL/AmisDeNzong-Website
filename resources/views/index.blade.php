@extends('app')
@section('content')
<!-- start subscribe confirmation modal -->
<x-front.modal :modal="session('modal')" />
<x-front.unsubscribe-modal :unsubscribe="session('unsubscribe')" />
<!-- end subscribe confirmation modal -->
<section class="home-slider owl-carousel">
	<div class="slider-item" style="background-image: url(/images/slide1.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
				<div class="col-md-8 text-center ftco-animate">
					<h1 class="mb-4">@lang('Primary Education') <span>@lang('English and Bilingual sections')</span></h1>
				</div>
			</div>
		</div>
	</div>

	<div class="slider-item" style="background-image: url(/images/slide2.jpg);">
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

@include('welcome-section')

<section class="ftco-section">
	<div class="container">
		<div class="d-flex justify-content-center">
			<div class="col-md-8 text-center heading-section ftco-animate">
				<h2 class="mb-4"><span>@lang('Our')</span> @lang('Gallery')</h2>
				<p>@lang('Learn more about the Private Bilingual school group LAÏC "LES AMIS DE NZONG ET FONDATION CANDIA" by exploring our Image Gallery')</p>
				<div class="portfolio-menu mt-2 mb-4">
					<ul>
						<li class="btn btn-outline-danger active" data-filter="*">@lang('All')</li>
						<li class="btn btn-outline-danger" data-filter=".kindergarten">@lang('Kindergarden')</li>
						<li class="btn btn-outline-danger" data-filter=".elementary">@lang('Elementary')</li>
						<li class="btn btn-outline-danger text" data-filter=".leisure">@lang('Leisure')</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="portfolio-item row d-flex justify-content-center">
			@if(@isset($kinderImages))
			@foreach($kinderImages as $index=>$kinderImage)
			<div class="item kindergarten col-lg-3 col-md-4 col-6 col-sm">
				<a href="{{url('images/'.$kinderImage->url)}}" class="fancylight popup-btn" data-fancybox-group="light">
					<img class="img-fluid" id="gallery-img" src="{{asset('images/'.$kinderImage->url)}}" alt="">
				</a>
			</div>
			@endforeach
			@endif
			@if(@isset($elementaryImages))
			@foreach($elementaryImages as $index=>$elementaryImage)
			<div class="item elementary col-lg-3 col-md-4 col-6 col-sm">
				<a href="{{url('images/'.$elementaryImage->url)}}" class="fancylight popup-btn" data-fancybox-group="light">
					<img class="img-fluid" id="gallery-img" src="{{asset('images/'.$elementaryImage->url)}}" alt="">
				</a>
			</div>
			@endforeach
			@endif
			@if(@isset($leisureImages))
			@foreach($leisureImages as $index=>$leisureImage)
			<div class="item leisure col-lg-3 col-md-4 col-6 col-sm">
				<a href="{{url('images/'.$leisureImage->url)}}" class="fancylight popup-btn" data-fancybox-group="light">
					<img class="img-fluid" id="gallery-img" src="{{asset('images/'.$leisureImage->url)}}" alt="">
				</a>
			</div>
			@endforeach
			@endif
		</div>
		<div class="text-center btn-gallery">
			<p><a href="{{ url('gallery')}}" class="btn px-4 py-3 mt-3 text-white">@lang('See more Gallery')</a></p>
		</div>
</section>

@include('testimonials-section')


<section class="ftco-section bg-light">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8 text-center heading-section ftco-animate">
				<h2 class="mb-4"><span>@lang('Latest')</span> @lang('News')</h2>
				<p>@lang('Get informed about the activities of the Private Bilingual school group LAÏC "LES AMIS DE NZONG ET FONDATION CANDIA" by reading our different news')</p>
			</div>
		</div>
		<div class="row">
			@if(@isset($news))
			@foreach($news as $indes=>$newsSingle )
			<div class="col-md-6 col-lg-4 ftco-animate">
				<div class="blog-entry">
					<a href="#" class="block-20 d-flex align-items-end" style="background-image: url('/images/{{$newsSingle->image->url}}');">
					</a>
					<div class="text bg-white p-4">
						<h3 class="heading"><a href="{{url('news-single/'.$newsSingle->id)}}">{{$newsSingle->title}}</a></h3>
						<p>{{$newsSingle->content}}</p>
						<div class="d-flex align-items-center mt-4">
							<p class="mb-0"><a href="{{ url('news-single/'.$newsSingle->id)}}" class="btn">@lang('Read More') <span class="ion-ios-arrow-round-forward"></span></a></p>
						</div>
					</div>
				</div>
			</div>
			@endforeach
			@endif
		</div>
		<div class="text-center btn-gallery">
			<p><a href="{{ url('news-events')}}" class="btn px-4 py-3 mt-3 text-white">@lang('See more News items')</a></p>
		</div>
	</div>
</section>

<section class="ftco-section bg-light">
	<div class="container">
		<div class="row justify-content-center mb-5 pb-2">
			<div class="col-md-8 text-center heading-section ftco-animate">
				<h2 class="mb-4"><span>@lang('Recent')</span> @lang('Blog')</h2>
				<p>@lang('Find articles on several subjects concerning the Private Bilingual school group LAÏC "LES AMIS DE NZONG ET FONDATION CANDIA" and more')</p>
			</div>
		</div>
		<div class="row d-flex justify-content-center">
			@if(@isset($posts))
			@foreach($posts as $index=>$post)
			<div class="col-md-6 col-lg-4 ftco-animate">
				<div class="blog-entry">
					<a href="{{ url('blog-single/'. $post->id)}}" class="block-20 d-flex align-items-end" style="background-image: url('/images/{{$post->image->url}}');">
						<div class="meta-date text-center p-2">
							<span class="day">{{ strftime('%m', strtotime($post->created_at)) }} </span>
							<span class="mos">{{ strftime('%B', strtotime($post->created_at)) }}</span>
							<span class="yr">{{ strftime('%Y', strtotime($post->created_at)) }}</span>
						</div>
					</a>
					<div class="text bg-white p-4">
						<h3 class="heading"><a href="#">{{$post->title}}</a></h3>
						<small class="">@lang('Written on') {{ strftime('%m %B %Y', strtotime($post->created_at)) }} @lang('By') {{$post->user->name}}</small>
						<p>{{$post->summary}}</p>
						<div class="d-flex align-items-center mt-4">
							<p class="mb-0"><a href="{{ url('blog-single/'. $post->id)}}" class="btn">@lang('Read More') <span class="ion-ios-arrow-round-forward"></span></a></p>
							<p class="ml-auto mb-0">
								@if($post->valid_comments_count)
								<span class="meta-chat blog-username"><span class="icon-chat"></span>{{ $post->valid_comments_count }}</span>
								@endif
							</p>
						</div>
					</div>
				</div>
			</div>
			@endforeach
			@endif
		</div>
		<div class="text-center btn-gallery">
			<p><a href="{{ url('blog')}}" class="btn px-4 py-3 mt-3 text-white">@lang('See more Articles')</a></p>
		</div>
	</div>
</section>

<section class="ftco-section bg-light">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8 text-center heading-section ftco-animate">
				<h2 class=""><span>@lang('Our')</span> @lang('Parteners')</h2>
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