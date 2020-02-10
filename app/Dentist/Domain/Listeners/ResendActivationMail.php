<?php


namespace App\Dentist\Domain\Listeners;


use App\Dentist\Domain\Events\ResendActivation;
use App\Dentist\Domain\Mails\Activation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class ResendActivationMail implements ShouldQueue
{
    use Queueable;

    public function handle(ResendActivation $event){
        Mail::to($event->user->email)->send(new Activation($event->user, $event->user->activation));
    }

}
