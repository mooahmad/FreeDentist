<?php

namespace App\Dentist\Domain\Observers;

use App\Dentist\Domain\Models\Dentist;
use Carbon\Carbon;

class DentistObserver
{
    /**
     * Handle the user "created" event.
     * 
     * @param Dentist $user
     */
    public function creating(Dentist $user)
    {
        $user->password = bcrypt($user->password);
        $user->birthdate = (new Carbon($user->birthdate))->format('Y-m-d');
    }

    /**
     * Handle the user "updated" event.
     *
     * @param  \App\Users\Domain\Models\Dentist  $user
     * @return void
     */
    public function updated(Dentist $user)
    {
        //
    }

    /**
     * Handle the user "deleted" event.
     *
     * @param  \App\Users\Domain\Models\Dentist  $user
     * @return void
     */
    public function deleted(Dentist $user)
    {
        //
    }

    /**
     * Handle the user "restored" event.
     *
     * @param  \App\Users\Domain\Models\Dentist  $user
     * @return void
     */
    public function restored(Dentist $user)
    {
        //
    }

    /**
     * Handle the user "force deleted" event.
     *
     * @param  \App\Users\Domain\Models\Dentist  $user
     * @return void
     */
    public function forceDeleted(Dentist $user)
    {
        //
    }
}
