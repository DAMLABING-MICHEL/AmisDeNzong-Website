<?php

namespace App\Repositories;

use App\Models\Event;

class EventRepository
{
    public $imageRepository;
    
    public function __construct()
    {
        $this->imageRepository = new ImageRepository();
    }
    
    public function findEvents()
    {
        $events = Event::all();
        return $events;
    }

    public function findEventById($id)
    {
        $event = Event::findOrFail($id);
        return $event;
    }

    public function addData($request)
    {
        $request->validate([
            'title_en' => 'required|max:255',
            'title_fr' => 'required|max:255',
            'title_it' => 'required|max:255',
            'summary_en' => 'required|max:255',
            'summary_fr' => 'required|max:255',
            'summary_it' => 'required|max:255',
            'description_en' => 'required|max:255',
            'description_fr' => 'required|max:255',
            'description_it' => 'required|max:255',
            'venue_en' => 'required|max:255',
            'venue_fr' => 'required|max:255',
            'venue_it' => 'required|max:255',
            'image' => 'required|max:255',
        ]);
        $request->merge([
            'title' => ['en' => $request->title_en, 'fr' => $request->title_fr, 'it' => $request->title_it,],
            'summary' => ['en' => $request->summary_en, 'fr' => $request->summary_fr, 'it' => $request->summary_it,],
            'description' => ['en' => $request->description_en, 'fr' => $request->description_fr, 'it' => $request->description_it,],
            'venue' => ['en' => $request->venue_en, 'fr' => $request->venue_fr, 'it' => $request->venue_it,],
            'date' => $request->date
        ]);
    }

    public function saveImage($event, $request)
    {
        $this->imageRepository->store($request, null, null, null, $event, null, null);
    }
    
    public function updateImage($request){
        $this->imageRepository->update($request);
    }
}
