<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\News;
use Illuminate\Http\Request;

class NewsEventsController extends Controller
{
    //
    public function getNews(){
        $news = News::all();
        $events = Event::all();
        return view('news-events',compact([
            'news',
            'events'
        ]));
    }
    
    public function getNewsSingle($id){
        $newsSingle = News::findOrFail($id);
        $lattestNews= News::limit(3)->select('*')->orderBy('created_at','asc')->get();
        return view('news-Single',compact(['newsSingle','lattestNews']));
    }
    public function event($id){
        $event = Event::findOrFail($id);
        return view('event-single',compact([
        'event'
        ]));
    }
}
