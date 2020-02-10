<?php

namespace App\Events\Domain\Services;

use App\App\Domain\Helpers\ApiHelper;
use App\App\Domain\Payloads\GenericPayload;
use App\App\Domain\Services\Service;
use App\Events\Domain\Models\Event;
use App\Events\Domain\Repositories\EventRepository;
use App\User_notification;
use Carbon\Carbon;

class UserAcceptService extends Service
{
    protected $events;

    public function __construct(EventRepository $events)
    {
        $this->events = $events;
    }

    public function handle(Event $event = null)
    {
        $eventDate = Carbon::parse($event->event_date)->toDateString();
        $nowDate = Carbon::now()->addDay()->toDateString();
        if ($nowDate == $eventDate) {
            $event->update(['status' => 2]);
            if ($event->dentist->device_id) {
                $message = config('helpers.patient.accept') . $event->id . config('helpers.for_date') . $event->event_date . config('helpers.for_service') . $event->service->service_name_ar . config('helpers.date') . $event->start_time;
                $details = ["message" => $message, 'event_id' => $event->id,];
                $notificationData = ApiHelper::buildNotification(config('helpers.notification_title'), $message, $details);
                ApiHelper::pushNotification(config('helpers.API_ACCESS_KEY'), $event->dentist->device_id, $notificationData);
            }
            ApiHelper::saveNotification($event->only(['id', 'dentist_id', 'treatment_id']), config('helpers.notification_title'), config('helpers.dentist.neglect'));
            return new GenericPayload(trans('api.success'));
        }
        return new GenericPayload(trans('api.patient_confirm'), 406);
    }
}