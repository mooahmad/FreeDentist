<?php

namespace App\Users\Domain\Observers;

use App\Users\Domain\Models\Dentist;
use App\Users\Domain\Models\User;
use Carbon\Carbon;

class UserObserver
{
    /**
     * Handle the user "created" event.
     *
     * @param  \App\Users\Domain\Models\Dentist  $user
     * @return void
     */
    public function creating(User $user)
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
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the user "deleted" event.
     *
     * @param  \App\Users\Domain\Models\Dentist  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the user "restored" event.
     *
     * @param  \App\Users\Domain\Models\Dentist  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the user "force deleted" event.
     *
     * @param  \App\Users\Domain\Models\Dentist  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
