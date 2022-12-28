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
<!-- START EVENT -->
<section class="ftco-section bg-light">
    <div class="container">
        @if(@isset($event))
        <div class="row justify-content-center">

            <div class="col-lg-6 col-sm-8 col-xs-12">
                    <img alt="Event title here" class="img-responsive event-image" src="/images/{{$event->image->url}}" />
                    <div class="single_event_text_single">
                        <h4>{{$event->title}}</h4>
                        <span><i class="icon icon-calendar"></i> {{ strftime('%m %b %Y', strtotime($event->date)) }}</span>
                        <span><i class="icon icon-clock-o"></i> {{ $event->start_time->format('h:i A') }}-{{ $event->end_time->format('h:i A') }}</span>
                        <span><i class="icon icon-table"></i><strong>{{$event->venue}}</strong></span>
                        <div class="single_event_content">
                            <p>{{$event->summary}}</p>
                            <h3>Event Descriptions</h3>
                            <p>{{$event->description}}</p>
                        </div>
                    </div>

                <!--- END SINGLE EVENT -->
            </div>
            <!--- END COL -->

            <div class="col-lg-4 col-sm-4 col-xs-12">
                <div class="event_info border rounded">
                    <h3 class="p-3 m-2 text-center text-white font-bold event-info-title">Event Informations</h3>
                    <div class="event-list pb-5">

                        <div class="d-flex pl-2 pt-4">
                            <span class="p-3 event-icon text-white"><i class="icon icon-calendar"></i></span>
                            <div class="d-flex flex-column">
                                <span>Event Date</span>
                                <span>{{ strftime('%m %b %Y', strtotime($event->date)) }}</span>
                            </div>
                        </div>
                        <div class="d-flex pl-2 pt-4">
                            <span class="p-3 event-icon text-white"><i class="icon icon-clock-o"></i></span>
                            <div class="d-flex flex-column">
                                <span>Start-End time</span>
                                <span>{{ $event->start_time->format('h:i A') }}-{{ $event->end_time->format('h:i A') }}</span>
                            </div>
                        </div>
                        <div class="d-flex pl-2 pt-4">
                            <span class="p-3 event-icon text-white"><i class="icon icon-phone"></i></span>
                            <div class="d-flex flex-column">
                                <span>Contact for Details</span>
                                <span>+237 650 71 83 89 / 693 03 44 72</span>
                            </div>
                        </div>
                        <div class="d-flex pl-2 pt-4">
                            <span class="p-3 event-icon text-white"><i class="icon icon-map"></i></span>
                            <div class="d-flex flex-column">
                                <span>Event Venue</span>
                                <span>{{$event->venue}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--- END COL -->


        </div><!-- END ROW -->
        @endif
    </div><!-- END CONTAINER -->
</section>
<!-- END EVENT -->
@endsection