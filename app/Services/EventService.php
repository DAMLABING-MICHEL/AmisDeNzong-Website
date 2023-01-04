<?php
    namespace App\Services;

use App\Repositories\EventRepository;

class EventService
{
    protected $eventRepository;
    
    public function __construct(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }
    
    public function getEvents(){
       return $this->eventRepository->findEvents();
    }
    
    public function getEventById($id){
        return $this->eventRepository->findEventById($id);
    }
}