<?php

namespace App\Service\Domain\Observers;

use App\Service\Domain\Models\Service;

class ServiceObserver
{
    /**
     * Handle the service "created" event.
     *
     * @param  \App\Service\Domain\Models\Service  $service
     * @return void
     */
    public function created(Service $service)
    {
        //
    }

    /**
     * Handle the service "updated" event.
     *
     * @param  \App\Service\Domain\Models\Service  $service
     * @return void
     */
    public function updated(Service $service)
    {
        //
    }

    /**
     * Handle the service "deleted" event.
     *
     * @param  \App\Service\Domain\Models\Service  $service
     * @return void
     */
    public function deleted(Service $service)
    {
        //
    }

    /**
     * Handle the service "restored" event.
     *
     * @param  \App\Service\Domain\Models\Service  $service
     * @return void
     */
    public function restored(Service $service)
    {
        //
    }

    /**
     * Handle the service "force deleted" event.
     *
     * @param  \App\Service\Domain\Models\Service  $service
     * @return void
     */
    public function forceDeleted(Service $service)
    {
        //
    }
}
