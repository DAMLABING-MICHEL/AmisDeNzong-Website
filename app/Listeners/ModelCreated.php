<?php

namespace App\Listeners;

use App\Events\ModelCreated as EventsModelCreated;
use App\Notifications\ModelCreatedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ModelCreated
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    /**
     * Handle the event.
     *
     * @param  \App\Events\ModelCreated  $event
     * @return void
     */
    public function handle(EventsModelCreated $event)
    {
        $event->model->notify(new ModelCreatedNotification);
    }
}
