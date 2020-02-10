<?php

namespace App\Followers\Domain\Observers;

use App\Followers\Domain\Models\Follower;
use Carbon\Carbon;

class FollowerObserver
{
    /**
     * Handle the follower "creating" event.
     *
     * @param  \App\Followers\Domain\Models\Follower  $follower
     * @return void
     */
    public function creating(Follower $follower)
    {
        $follower->birthdate = (new Carbon($follower->birthdate))->format('Y-m-d');
    }

    /**
     * Handle the follower "updated" event.
     *
     * @param  \App\Followers\Domain\Models\Follower  $follower
     * @return void
     */
    public function updated(Follower $follower)
    {
        //
    }

    /**
     * Handle the follower "deleted" event.
     *
     * @param  \App\Followers\Domain\Models\Follower  $follower
     * @return void
     */
    public function deleted(Follower $follower)
    {
        //
    }

    /**
     * Handle the follower "restored" event.
     *
     * @param  \App\Followers\Domain\Models\Follower  $follower
     * @return void
     */
    public function restored(Follower $follower)
    {
        //
    }

    /**
     * Handle the follower "force deleted" event.
     *
     * @param  \App\Followers\Domain\Models\Follower  $follower
     * @return void
     */
    public function forceDeleted(Follower $follower)
    {
        //
    }
}
