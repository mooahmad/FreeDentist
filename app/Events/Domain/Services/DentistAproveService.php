<?php

namespace App\Events\Domain\Services;

use App\App\Domain\Helpers\ApiHelper;
use App\App\Domain\Payloads\GenericPayload;
use App\App\Domain\Services\Service;
use App\Events\Domain\Models\Event;
use App\Events\Domain\Repositories\EventRepository;
use Carbon\Carbon;

class DentistAproveService extends Service
{
    protected $events;

    public function __construct(EventRepository $events)
    {
        $this->events = $events;
    }

    public function handle(Event $event = null)
    {
        $date = Carbon::now()->toDateString();
        if ($event->event_date >= $date) {
            $event->update(['status' => 5]);
            if ($event->device_id) {
                $message = config('helpers.dentist.approve') . $event->id . config('helpers.for_date') . $event->event_date . config('helpers.for_service') . $event->service->service_name_ar . config('helpers.date') . $event->start_time;
                $details = ["message" => $message, 'event_id' => $event->id,];
                $notificationData = ApiHelper::buildNotification(config('helpers.notification_title'), $message, $details);
                ApiHelper::pushNotification(config('helpers.API_ACCESS_KEY'), $event->dentist->device_id, $notificationData);
            }
            ApiHelper::saveNotification($event->only(['id', 'user_id', 'treatment_id']), config('helpers.notification_title'), config('helpers.dentist.approve'));
            return new GenericPayload(trans('api.success'));
        }
        return new GenericPayload(trans('api.approve_failed'));
    }
}