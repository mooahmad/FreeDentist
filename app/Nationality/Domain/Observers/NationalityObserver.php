<?php

namespace App\Nationality\Domain\Observers;

use App\Nationality\Domain\Models\Nationality;

class NationalityObserver
{
    /**
     * Handle the nationality "created" event.
     *
     * @param  \App\Nationality\Domain\Models\Nationality  $nationality
     * @return void
     */
    public function created(Nationality $nationality)
    {
        //
    }

    /**
     * Handle the nationality "updated" event.
     *
     * @param  \App\Nationality\Domain\Models\Nationality  $nationality
     * @return void
     */
    public function updated(Nationality $nationality)
    {
        //
    }

    /**
     * Handle the nationality "deleted" event.
     *
     * @param  \App\Nationality\Domain\Models\Nationality  $nationality
     * @return void
     */
    public function deleted(Nationality $nationality)
    {
        //
    }

    /**
     * Handle the nationality "restored" event.
     *
     * @param  \App\Nationality\Domain\Models\Nationality  $nationality
     * @return void
     */
    public function restored(Nationality $nationality)
    {
        //
    }

    /**
     * Handle the nationality "force deleted" event.
     *
     * @param  \App\Nationality\Domain\Models\Nationality  $nationality
     * @return void
     */
    public function forceDeleted(Nationality $nationality)
    {
        //
    }
}
