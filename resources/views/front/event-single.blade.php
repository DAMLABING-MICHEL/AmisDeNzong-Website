@extends('front.app')
@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url({{asset('images/news-events.jpg')}});">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-2 bread">@lang('News & Events')</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="{{ url('/')}}">@lang('Home') <i class="ion-ios-arrow-forward"></i></a><span class="mr-2"><a href="{{url('/news-events')}}">@lang('News & Events') <i class="ion-ios-arrow-forward"></i></a></span> <span>@lang('Event Single') <i class="ion-ios-arrow-forward"></i></span></p>
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
                    @if (!@empty($event->image))
                    <img alt="Event title here" class="img-responsive event-image" src="{{ getImage($event) }}" />
                    @endif
                    <div class="single_event_text_single">
                        <h4>{{$event->title}}</h4>
                        <span><i class="icon icon-calendar"></i> {{ (\carbon\carbon::parse($event->date)->isoFormat("LL")) }}</span>
                        <span><i class="icon icon-clock-o"></i> {{ \carbon\carbon::parse($event->start_time)->format('h:i A') }} - {{ \carbon\carbon::parse($event->end_time)->format('h:i A') }}</span>
                        <span><i class="icon icon-table"></i><strong>{{$event->venue}}</strong></span>
                        <div class="single_event_content">
                            <p>{!! $event->summary !!}</p>
                            <h3>@lang('Event Description')</h3>
                            <p>{!! $event->description !!}</p>
                        </div>
                    </div>

                <!--- END SINGLE EVENT -->
            </div>
            <!--- END COL -->

            <div class="col-lg-4 col-sm-4 col-xs-12">
                <div class="event_info border rounded">
                    <h3 class="p-3 m-2 text-center text-white font-bold event-info-title">@lang('Event Informations')</h3>
                    <div class="event-list pb-5">

                        <div class="d-flex pl-2 pt-4">
                            <span class="p-3 event-icon text-white"><i class="icon icon-calendar"></i></span>
                            <div class="d-flex flex-column">
                                <span>@lang('Event Date')</span>
                                <span>{{ (\carbon\carbon::parse($event->date)->isoFormat("LL")) }}</span>
                            </div>
                        </div>
                        <div class="d-flex pl-2 pt-4">
                            <span class="p-3 event-icon text-white"><i class="icon icon-clock-o"></i></span>
                            <div class="d-flex flex-column">
                                <span>@lang('Start-End time')</span>
                                <span>{{ \carbon\carbon::parse($event->start_time)->format('h:i A') }} - {{ \carbon\carbon::parse($event->end_time)->format('h:i A') }}</span>
                            </div>
                        </div>
                        <div class="d-flex pl-2 pt-4">
                            <span class="p-3 event-icon text-white"><i class="icon icon-phone"></i></span>
                            <div class="d-flex flex-column">
                                <span>@lang('Contact for Details')</span>
                                <span>{{$event->contact}}</span>
                            </div>
                        </div>
                        <div class="d-flex pl-2 pt-4">
                            <span class="p-3 event-icon text-white"><i class="icon icon-map"></i></span>
                            <div class="d-flex flex-column">
                                <span>@lang('Event Venue')</span>
                                <span>{{ $event->venue }}</span>
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