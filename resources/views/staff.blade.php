@extends('app')
@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url('/images/teacher-bg.jpg');">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<h1 class="mb-2 bread">Our Staff</h1>
				<p class="breadcrumbs"><span class="mr-2"><a href="{{ url('/')}}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Staff <i class="ion-ios-arrow-forward"></i></span></p>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section ftco-no-pb">
	<div class="container">
		@foreach($features as $index => $feature)
		<div class="d-flex flex-column">
			<div class="text-center heading-section ftco-animate d-lex justify-content-center">
				<h2 class="text-center">{{$feature->title}}</h2>
			</div>
			<div class="row justify-content-center">
				@foreach($staffs as $index => $staff)
				@if($staff->feature_id == $feature->id)
				@for($i=0;$i < 4;$i++) <div class="col-md-6 col-lg-3 ftco-animate">
					<div class="staff">
						<div class="img-wrap d-flex align-items-stretch">
							@if(@isset($staff->image))
							<div class="img align-self-stretch" style="background-image: url(/images/{{$staff->image->url}});"></div>
							@else
							<div class="img align-self-stretch" style="background-image: url(/images/{{$staff->image->url}});"></div>
							@endif
						</div>
						<div class="text pt-3 text-center">
							<h3>{{ $staff->lastName }}</h3>
							<span class="position mb-2">{{$staff->position}}</span>
							<div class="faded">
								<p>{{$staff->description}}</p>
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
			@endfor
			@endif
			@endforeach
		</div>
	</div>
	@endforeach
	</div>
</section>
@endsection