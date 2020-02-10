<?php

namespace App\Events\Domain\Services;

use App\App\Domain\Payloads\GenericPayload;
use App\App\Domain\Services\Service;
use App\Event;
use App\Events\Domain\Repositories\EventRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class UpcomingDentistReservationService extends Service
{
    protected $events;

    public function __construct(EventRepository $events)
    {
        $this->events = $events;
    }

    public function handle($data = [])
    {
        $user = Auth::id();
        $event = $this->events->where('event_date', '>=', Carbon::now())->where('status', 0)->where('dentist_id', $user)->paginate(10);
        return new GenericPayload($event);
    }
}