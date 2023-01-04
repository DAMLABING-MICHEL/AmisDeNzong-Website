<?php

namespace App\Http\Controllers;

use App\Services\EventService;
use App\Services\NewsService;

class NewsEventsController extends Controller
{
    protected $newsService;
    protected $eventService;
    
    public function __construct(NewsService $newsService,EventService $eventService)
    {
        $this->newsService = $newsService;
        $this->eventService = $eventService;
    }
    public function index(){
        $news = $this->newsService->getNews(null);
        $events = $this->eventService->getEvents();
        return view('front.news-events',compact([
            'news',
            'events'
        ]));
    }
    
    public function getNewsSingle($id){
        $newsSingle = $this->newsService->getNewsById($id);
        $lattestNews= $this->newsService->getLatestNews();
        return view('front.news-Single',compact(['newsSingle','lattestNews']));
    }
    public function event($id){
        $event = $this->eventService->getEventById($id);
        return view('front.event-single',compact([
        'event'
        ]));
    }
}
