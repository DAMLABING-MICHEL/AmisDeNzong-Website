@extends('app')
@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url('/images/news-events.jpg');">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<h1 class="mb-2 bread">News & Events</h1>
				<p class="breadcrumbs"><span class="mr-2"><a href="{{ url('/')}}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>News & Events <i class="ion-ios-arrow-forward"></i></span></p>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section bg-light">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8 text-center heading-section ftco-animate">
				<h2 class="mb-4"><span>Our</span> News</h2>
				<p>Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p>
			</div>
		</div>
		<div class="row justify-content-center">
			@if(@isset($news))
			@foreach($news as $index=>$newsSingle)
			<div class="col-md-6 col-lg-4 ftco-animate">
				<div class="blog-entry">
					<a href="{{url('/news-single/'.$newsSingle->id)}}" class="block-20 d-flex align-items-end" style="background-image: url('images/{{$newsSingle->image->url}}');">
					</a>
					<div class="text bg-white p-4">
						<h3 class="heading"><a href="{{url('/news-single/'.$newsSingle->id)}}">{{$newsSingle->title}}</a></h3>
						<p>{{$newsSingle->content}}</p>
					</div>
				</div>
			</div>
			@endforeach
			@endif
		</div>
		<div class="row justify-content-center">
			<div class="col-md-8 text-center heading-section ftco-animate">
				<h2 class="mb-4"><span>Our</span> Events</h2>
				<p>Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p>
			</div>
		</div>
		<div class="row justify-content-center">
			@if(@isset($events))
			@foreach($events as $index=>$event)
			<div class="col-md-6 col-lg-6 ftco-animate">
				<div class="blog-entry">
					<div class="block-20 d-flex" style="background-image: url('/images/{{$event->image->url}}');">
						<div class="text-center p-2 event-date d-flex justify-content-center rounded">
							<div class="p-2" id="event-day"><span class="day text-white">{{ strftime('%m', strtotime($event->date)) }}</span></div>
							<div class="p-2" id="event-month"><span class="mos text-white">{{ strftime('%b', strtotime($event->date)) }}</span></div>
						</div>
					</div>
					<div class="text bg-white p-4">
						<h3 class="heading"><a href="{{route('event',$event->id)}}">{{$event->title}}</a></h3>
						<div class="d-flex">
							<p class="mb-0"><span class="icon icon-calendar event-grid-icon"></span> {{ strftime('%m %b %Y', strtotime($event->date)) }}</p>
							<p class="mb-0 ml-3"><span class="icon icon-clock-o event-grid-icon"></span> {{ $event->start_time->format('h:i A') }}-{{ $event->end_time->format('h:i A') }}</p>
							<p class="mb-0 ml-3"><span class="icon icon-table event-grid-icon"></span> {{ $event->venue}}</p>
						</div>
						<p>{{$event->summary}}</p>
						<div class="d-flex align-items-center mt-4">
							<p class="mb-0"><a href="{{route('event',$event->id)}}" class="btn">Read More<span class="ion-ios-arrow-round-forward"></span></a></p>
						</div>
					</div>
				</div>
			</div>
			@endforeach
			@endif
		</div>
	</div>
</section>
@endsection