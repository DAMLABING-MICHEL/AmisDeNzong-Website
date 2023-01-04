<?php
namespace App\Repositories;

use App\Models\Event;

class EventRepository
{
    
    public function findEvents(){
        $events = Event::all();
        return $events;
    }
    
    public function findEventById($id){
        $event = Event::findOrFail($id);
        return $event;
    }
    
}
