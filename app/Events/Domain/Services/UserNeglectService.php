<?php

namespace App\Events\Domain\Services;

use App\App\Domain\Helpers\ApiHelper;
use App\App\Domain\Payloads\GenericPayload;
use App\App\Domain\Services\Service;

use App\Dentist\Domain\Repositories\DentistCalendarRepository;
use App\Events\Domain\Models\Event;
use App\Events\Domain\Repositories\EventRepository;


class UserNeglectService extends Service
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
        if ($event->status == 0) {
            $updateAll = $this->events->where('created_at', $event->created_at)->update(['status' => 6, 'dentist_notify' => 0]);
            $message = config('helpers.patient.cancel') . $event->id . config('helpers.for_date') . $event->event_date . config('helpers.for_service') . $event->service->service_name_ar . config('helpers.date') . $event->start_time;
            $details = ["message" => $message, 'event_id' => $event->id,];
            $notificationData = ApiHelper::buildNotification(config('helpers.notification_title'), $message, $details);

            if ($event->dentist->device_id)
                ApiHelper::pushNotification(config('helpers.API_ACCESS_KEY'), $event->dentist->device_id, $notificationData);
            elseif ($event->device_id)
                ApiHelper::pushNotification(config('helpers.API_ACCESS_KEY'), $event->device_id, $notificationData);

            ApiHelper::saveNotification($event->only(['id', 'dentist_id', 'treatment_id']), config('helpers.notification_title'), config('helpers.patient.cancel'));
            ApiHelper::saveNotification($event->only(['id', 'user_id', 'treatment_id']), config('helpers.notification_title'), config('helpers.patient.cancel'));

        } else {
            $event->update(['status' => 4]);
            $calendar = $this->calendar->dentistCalendar($event->only(['hospital_id', 'treatment_id', 'event_date', 'dentist_id', 'start_time']));
            if ($calendar) $calendar->update(['status' => 0]);

            $message = config('helpers.patient.neglect') . $event->id . config('helpers.for_date') . $event->event_date . config('helpers.for_service') . $event->service->service_name_ar . config('helpers.date') . $event->start_time;
            $details = ["message" => $message, 'event_id' => $event->id,];
            $notificationData = ApiHelper::buildNotification(config('helpers.notification_title'), $message, $details);

            if ($event->dentist->device_id)
                ApiHelper::pushNotification(config('helpers.API_ACCESS_KEY'), $event->dentist->device_id, $notificationData);
            elseif ($event->device_id)
                ApiHelper::pushNotification(config('helpers.API_ACCESS_KEY'), $event->device_id, $notificationData);

            ApiHelper::saveNotification($event->only(['id', 'dentist_id', 'treatment_id']), config('helpers.notification_title'), config('helpers.patient.neglect'));
            ApiHelper::saveNotification($event->only(['id', 'user_id', 'treatment_id']), config('helpers.notification_title'), config('helpers.patient.neglect'));

        }
        return new GenericPayload(trans('api.success'));
    }
}