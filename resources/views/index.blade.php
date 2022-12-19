@extends('app')
@section('content')
<!-- start subscribe confirmation madal -->
<!-- Modal -->
<x-front.modal :modal="session('modal')" />
<x-front.unsubscribe-modal :unsubscribe="session('unsubscribe')" />
<!-- end subscribe confirmation maodal -->
<section class="home-slider owl-carousel">
	<div class="slider-item" style="background-image: url(/images/slide1.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
				<div class="col-md-8 text-center ftco-animate">
					<h1 class="mb-4">Kids Are The Best <span>Explorers In The World</span></h1>
					<p><a href="{{ url('about.blade.php')}}" class="btn px-4 py-3 mt-3 text-white">Read More</a></p>
				</div>
			</div>
		</div>
	</div>

	<div class="slider-item" style="background-image: url(/images/slide2.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
				<div class="col-md-8 text-center ftco-animate">
					<h1 class="mb-4">Perfect Learned<span> For Your Child</span></h1>
					<p><a href="{{ url('about.blade.php')}}" class="btn px-4 py-3 mt-3 text-white">Read More</a></p>
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
						<h3 class="heading">Certified Teachers</h3>
						<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
					</div>
				</div>
			</div>
			<div class="col-md-3 d-flex services align-self-stretch pb-4 px-4 ftco-animate service2">
				<div class="media block-6 d-block text-center">
					<div class="icon d-flex justify-content-center align-items-center">
						<span class="flaticon-reading"></span>
					</div>
					<div class="media-body p-2 mt-3">
						<h3 class="heading">Special Education</h3>
						<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
					</div>
				</div>
			</div>
			<div class="col-md-3 d-flex services align-self-stretch pb-4 px-4 ftco-animate service3">
				<div class="media block-6 d-block text-center">
					<div class="icon d-flex justify-content-center align-items-center">
						<span class="flaticon-books"></span>
					</div>
					<div class="media-body p-2 mt-3">
						<h3 class="heading">Book &amp; Library</h3>
						<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
					</div>
				</div>
			</div>
			<div class="col-md-3 d-flex services align-self-stretch pb-4 px-4 ftco-animate service4">
				<div class="media block-6 d-block text-center">
					<div class="icon d-flex justify-content-center align-items-center">
						<span class="flaticon-diploma"></span>
					</div>
					<div class="media-body p-2 mt-3">
						<h3 class="heading">Certification</h3>
						<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section ftco-no-pt ftc-no-pb">
	<div class="container">
		<div class="row">
			<div class="col-md-5 order-md-last wrap-about py-5 wrap-about bg-light">
				<div class="text px-4 ftco-animate">
					<h2 class="mb-4">Welcome to Groupe Scolaire "Les Amis De Nzong & Fondation Candia" Learning School</h2>
					<p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word.</p>
					<p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia. And if she hasn’t been rewritten, then they are still using her.</p>
					<p><a href="{{ url('about.blade.php')}}" class="btn px-4 py-3 text-white">Read More</a></p>
				</div>
			</div>
			<div class="col-md-7 wrap-about py-5 pr-md-4 ftco-animate">
				<h2 class="mb-4">What We Offer</h2>
				<p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word.</p>
				<div class="row mt-5">
					<div class="col-lg-6">
						<div class="services-2 d-flex">
							<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span class="flaticon-security"></span></div>
							<div class="text">
								<h3>Safety First</h3>
								<p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="services-2 d-flex">
							<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span class="flaticon-reading"></span></div>
							<div class="text">
								<h3>Kindergarten education</h3>
								<p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="services-2 d-flex">
							<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span class="flaticon-diploma"></span></div>
							<div class="text">
								<h3>Primary education</h3>
								<p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="services-2 d-flex">
							<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span class="flaticon-education"></span></div>
							<div class="text">
								<h3>Basic courses in Italian and Computer Science</h3>
								<p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="services-2 d-flex">
							<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span class="flaticon-jigsaw"></span></div>
							<div class="text">
								<h3>Pupil transport bus</h3>
								<p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="services-2 d-flex">
							<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span class="flaticon-kids"></span></div>
							<div class="text">
								<h3>Sports Facilities</h3>
								<p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>





<section class="ftco-section ftco-no-pb">
	<div class="container">
		<div class="row justify-content-center mb-5 pb-2">
			<div class="col-md-8 text-center heading-section ftco-animate">
				<h2 class="mb-4"><span>Certified</span> Teachers</h2>
				<p>Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p>
			</div>
		</div>
		<div class="row">
			@if(@isset($certifiedTeachers))
			@foreach($certifiedTeachers as $index=>$certifiedTeachers)
			<div class="col-md-6 col-lg-3 ftco-animate">
				<div class="staff">
					<div class="img-wrap d-flex align-items-stretch">
						@if(!@empty($certifiedTeachers->image))
						<div class="img align-self-stretch" style="background-image: url(images/{{$certifiedTeachers->image->url}});"></div>
						@endif

					</div>
					<div class="text pt-3 text-center">
						<h3>{{$certifiedTeachers->lastName}}</h3>
						<span class="position mb-2">{{$certifiedTeachers->position}}</span>
						<div class="faded">
							<p>{{$certifiedTeachers->description}}</p>
							<ul class="ftco-social text-center">
								<li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
								<li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
								<li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
								<li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			@endforeach
			@endif

		</div>
	</div>
</section>

<section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(/images/bg_4.jpg);" data-stellar-background-ratio="0.5">
	<div class="container">
		<div class="row justify-content-center mb-5 pb-2">
			<div class="col-md-8 text-center heading-section heading-section-black ftco-animate">
				<h2 class="mb-4"><span>7 Years of</span> Experience</h2>
				<p>Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p>
			</div>
		</div>
		<div class="row d-md-flex align-items-center justify-content-center">
			<div class="col-lg-10">
				<div class="row d-md-flex align-items-center justify-content-center">
					<div class="col-md-2 d-flex justify-content-center counter-wrap ftco-animate">
						<div class="block-18">
							<div class="icon"><span class="flaticon-doctor"></span></div>
							<div class="text">
								<strong class="number" data-number="18">0</strong>
								<span>Certified Teachers</span>
							</div>
						</div>
					</div>
					<div class="col-md-2 d-flex justify-content-center counter-wrap ftco-animate">
						<div class="block-18">
							<div class="icon"><span class="flaticon-doctor"></span></div>
							<div class="text">
								<strong class="number" data-number="351">0</strong>
								<span>Successful Kids</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section">
	<div class="container">
		<div class="d-flex justify-content-center">
			<div class="col-md-8 text-center heading-section ftco-animate">
				<h2 class="mb-4"><span>Our</span> Gallery</h2>
				<p>Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p>
				<div class="portfolio-menu mt-2 mb-4">
					<ul>
						<li class="btn btn-outline-danger active" data-filter="*">All</li>
						<li class="btn btn-outline-danger" data-filter=".kindergarden">Kindergarden</li>
						<li class="btn btn-outline-danger" data-filter=".elementary">Elementary</li>
						<li class="btn btn-outline-danger text" data-filter=".leisure">Leisure</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="portfolio-item row d-flex justify-content-center">
			@if(@isset($kinderImages))
			@foreach($kinderImages as $index=>$kinderImage)
			<div class="item kindergarden col-lg-3 col-md-4 col-6 col-sm">
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
			<p><a href="{{ url('gallery.blade.php')}}" class="btn px-4 py-3 mt-3 text-white">see more Gallery</a></p>
		</div>
</section>

<section class="ftco-section testimony-section bg-light">
	<div class="container">
		<div class="row justify-content-center mb-5 pb-2">
			<div class="col-md-8 text-center heading-section ftco-animate">
				<h2 class="mb-4"><span>What Parents</span> Says About Us</h2>
				<p>Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p>
			</div>
		</div>
		<div class="row ftco-animate justify-content-center">
			<div class="col-md-12">
				<div class="carousel-testimony owl-carousel">
					@if(@isset($testimonials))
					@foreach($testimonials as $index=>$testimonial)
					<div class="item">
						<div class="testimony-wrap d-flex">
							@if(@isset($testimonial->image))
							<div class="user-img mr-4" style="background-image: url(images/{{$testimonial->image->url}})">
							</div>
							@endif
							<div class="text ml-2 bg-light">
								<span class="quote d-flex align-items-center justify-content-center">
									<i class="icon-quote-left"></i>
								</span>
								<p>{{$testimonial->content}}</p>
								<p class="name">{{$testimonial->name}}</p>
								<span class="position">{{$testimonial->feature}}</span>
							</div>
						</div>
					</div>
					@endforeach
					@endif
				</div>
			</div>
		</div>
	</div>
</section>



<section class="ftco-section bg-light">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8 text-center heading-section ftco-animate">
				<h2 class="mb-4"><span>Lattest</span> News</h2>
				<p>Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p>
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
						<h3 class="heading"><a href="{{'/news-single/'.$newsSingle->id}}">{{$newsSingle->title}}</a></h3>
						<p>{{$newsSingle->content}}</p>
					</div>
				</div>
			</div>
			@endforeach
			@endif
		</div>
	</div>
</section>

<section class="ftco-section bg-light">
	<div class="container">
		<div class="row justify-content-center mb-5 pb-2">
			<div class="col-md-8 text-center heading-section ftco-animate">
				<h2 class="mb-4"><span>Recent</span> Blog</h2>
				<p>Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p>
			</div>
		</div>
		<div class="row">
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
						<p>{{$post->summary}}</p>
						<div class="d-flex align-items-center mt-4">
							<p class="mb-0"><a href="{{ url('blog-single/'. $post->id)}}" class="btn">Read More <span class="ion-ios-arrow-round-forward"></span></a></p>
							<p class="ml-auto mb-0">
								<span class="mr-2 blog-username">{{$post->user->name}}</span>
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
	</div>
</section>

<section class="ftco-section bg-light">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8 text-center heading-section ftco-animate">
				<h2 class=""><span>Our</span> Parteners</h2>
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