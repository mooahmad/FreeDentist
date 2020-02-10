<?php

namespace App\Events\Domain\Observers;

use App\Events\Domain\Models\Event;

class EventObserver
{
    /**
     * Handle the event "created" event.
     *
     * @param  \App\Events\Domain\Models\Event  $event
     * @return void
     */
    public function created(Event $event)
    {
        //
    }

    /**
     * Handle the event "updated" event.
     *
     * @param  \App\Events\Domain\Models\Event  $event
     * @return void
     */
    public function updated(Event $event)
    {
        //
    }

    /**
     * Handle the event "deleted" event.
     *
     * @param  \App\Events\Domain\Models\Event  $event
     * @return void
     */
    public function deleted(Event $event)
    {
        //
    }

    /**
     * Handle the event "restored" event.
     *
     * @param  \App\Events\Domain\Models\Event  $event
     * @return void
     */
    public function restored(Event $event)
    {
        //
    }

    /**
     * Handle the event "force deleted" event.
     *
     * @param  \App\Events\Domain\Models\Event  $event
     * @return void
     */
    public function forceDeleted(Event $event)
    {
        //
    }
}
