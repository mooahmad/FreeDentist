<?php

namespace App\Events\Domain\Services;

use App\App\Domain\Payloads\GenericPayload;
use App\App\Domain\Services\Service;
use App\Events\Domain\Repositories\EventRepository;
class AcceptReservationService extends Service
{
    protected $events;
    public function __construct(EventRepository $events) 
    {
        $this->events = $events;
    }
    public function handle($data = []) 
    {
        return new GenericPayload($this->events->all());
    }
}