<?php

namespace App\Dentist\Domain\Listeners;

use App\Dentist\Domain\Events\UserWasRegistered;
use App\Dentist\Domain\Mails\Activation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendActivationMail implements ShouldQueue
{
    use Queueable;
    /**
     * Handle the event.
     *
     * @param  ActivationEvent  $event
     * @return void
     */
    public function handle(UserWasRegistered $event)
    {

        Mail::to($event->user->email)->send(new Activation($event->user, $event->user->activation));
    }
}
