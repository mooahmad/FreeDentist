<?php

namespace App\Events\Domain\Services;

use App\App\Domain\Payloads\GenericPayload;
use App\App\Domain\Services\Service;
use App\Events\Domain\Repositories\EventRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PreviousReservationService extends Service
{
    protected $events;

    public function __construct(EventRepository $events)
    {
        $this->events = $events;
    }

    public function handle($data = [])
    {
        $user = Auth::id();
        $event = $this->events->where('user_id', $user)->where('event_date', '<', Carbon::now()->toDateString())->whereIn('status', [3, 4, 5, 6])->paginate(10);
        return new GenericPayload($event);
    }
}