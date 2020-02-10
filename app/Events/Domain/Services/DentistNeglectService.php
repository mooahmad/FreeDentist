<?php

namespace App\Events\Domain\Services;

use App\App\Domain\Helpers\ApiHelper;
use App\App\Domain\Payloads\GenericPayload;
use App\App\Domain\Services\Service;
use App\Dentist\Domain\Repositories\DentistCalendarRepository;
use App\Dentist_calander;

use App\Events\Domain\Models\Event;
use App\Events\Domain\Repositories\EventRepository;
use App\User_notification;

class DentistNeglectService extends Service
{
    protected $events;
    protected $calendar;

    public function __construct(EventRepository $events, DentistCalendarRepository $calendar)
    {
        $this->events = $events;
        $this->calendar = $calendar;
    }

    public function handle(Event $event = null)
    {
        $event->update(['status' => 3, 'neglect' => 1]);
        $dentistCalendar = $this->calendar->dentistCalendar($event->only(['dentist_id', 'treatment_id', 'event_date', 'hospital_id', 'start_time']));
        if ($dentistCalendar) $dentistCalendar->update(['status' => 0, 'flag' => 0]);

        if ($event->device_id) {
            $message = config('helpers.dentist.neglect') . $event->id . ' بتاريخ ' . $event->event_date .config('helpers.for_service'). $event->service->service_name_ar . config('helpers.date') . $event->start_time;
            $details = ["message" => $message, 'event_id' => $event->id,];
            $notificationData = ApiHelper::buildNotification(config('helpers.notification_title'), $message, $details);
            ApiHelper::pushNotification(config('helpers.API_ACCESS_KEY'), $event->device_id, $notificationData);
        }
        ApiHelper::saveNotification($event->only(['id', 'user_id', 'treatment_id']), config('helpers.notification_title'), config('helpers.dentist.neglect'));
        return new GenericPayload(trans('api.success'));
    }
}