<?php

namespace App\Cities\Domain\Observers;

use App\Cities\Domain\Models\City;

class CityObserver
{
    /**
     * Handle the city "created" event.
     *
     * @param  \App\Cities\Domain\Models\City  $city
     * @return void
     */
    public function created(City $city)
    {
        //
    }

    /**
     * Handle the city "updated" event.
     *
     * @param  \App\Cities\Domain\Models\City  $city
     * @return void
     */
    public function updated(City $city)
    {
        //
    }

    /**
     * Handle the city "deleted" event.
     *
     * @param  \App\Cities\Domain\Models\City  $city
     * @return void
     */
    public function deleted(City $city)
    {
        //
    }

    /**
     * Handle the city "restored" event.
     *
     * @param  \App\Cities\Domain\Models\City  $city
     * @return void
     */
    public function restored(City $city)
    {
        //
    }

    /**
     * Handle the city "force deleted" event.
     *
     * @param  \App\Cities\Domain\Models\City  $city
     * @return void
     */
    public function forceDeleted(City $city)
    {
        //
    }
}
