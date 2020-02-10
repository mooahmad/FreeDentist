<?php

namespace App\Events\Domain\Services;

use App\App\Domain\Helpers\Helper;
use App\App\Domain\Payloads\FailedPayload;
use App\App\Domain\Payloads\GenericPayload;
use App\App\Domain\Services\Service;
use App\Dentist\Domain\Repositories\DentistRepository;
use App\Events\Domain\Pipelines\ReservationPipeline;
use App\Events\Domain\Repositories\EventRepository;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\Auth;

class AddReservationService extends Service
{
    protected $events;
    protected $dentist;

    public function __construct(EventRepository $events, DentistRepository $dentist)
    {
        $this->events = $events;
        $this->dentist = $dentist;
    }

    public function handle($data = [])
    {
        $pipes = [
            ReservationPipeline::class,
        ];
        $reservation = app(Pipeline::class)->through($pipes)->send($data)->then(function ($reservation) {
            return $reservation;
        });
        return !empty($reservation) ? new GenericPayload(trans('api.success')) : new FailedPayload ;
    }
}