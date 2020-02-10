<?php

namespace App\Events\Domain\Services;

use App\App\Domain\Payloads\GenericPayload;
use App\App\Domain\Services\Service;
use App\Events\Domain\Repositories\EventRepository;
use Illuminate\Support\Facades\DB;

class EventDetailsService extends Service
{
    protected $events;

    public function __construct(EventRepository $events)
    {
        $this->events = $events;
    }

    public function handle($data = [])
    {
        $event = DB::table('events')
            ->join('services', 'events.treatment_id', '=', 'services.id')
            ->join('dentists', 'events.dentist_id', '=', 'dentists.id')
            ->join('hospitals', 'events.hospital_id', '=', 'hospitals.id')
            ->join('users', 'events.user_id', '=', 'users.id')
            ->where('events.id', $data['id'])
            ->select("events.*", "events.id As event_id", "events.photo As event_photo", "dentists.*", "dentists.name As D_name", "dentists.mobile As D_mobile", "hospitals.*", "services.*", "users.name As Uname", "users.mobile As U_mobile")
            ->get();
        return new GenericPayload($event);
    }
}