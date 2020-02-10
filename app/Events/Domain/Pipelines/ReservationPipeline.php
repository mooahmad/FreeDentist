<?php

namespace App\Events\Domain\Pipelines;

use App\App\Domain\Helpers\ApiHelper;
use App\App\Domain\Helpers\Helper;
use App\App\Domain\Payloads\GenericPayload;
use App\Dentist\Domain\Models\Dentist;
use App\Dentist\Domain\Repositories\DentistRepository;
use App\Events\Domain\Repositories\EventRepository;
use App\User_notification;
use App\Users\Domain\Models\UserNotification;
use Carbon\Carbon;
use League\Flysystem\Config;

class ReservationPipeline
{
    protected $dentist;

    protected $events;

    public function __construct(EventRepository $events, DentistRepository $dentist)
    {
        $this->dentist = $dentist;
        $this->events = $events;
    }

    public function handle($data, \Closure $next)
    {

        $reservation = [];
        $dentistArr = explode(',', $data['dentist_id']);
        foreach ($dentistArr as $dentistId) {
            $dentist = $this->dentist->getById($dentistId);
            if ($dentist) {
                $data['dentist_id'] = $dentistId;

                $data['$relation'] = $data['user'] == 0 ? 0 : 1;
                if (!empty($data['photo'])) {
                    $photo = (new Helper())->UploadFile($data['photo'], 'event');
                    $data['photo'] = $photo;
                }
                $event = $this->events->create($data);
                $eventData = $event->only(['id', 'dentist_id', 'treatment_id']);
                ApiHelper::saveNotification($eventData, config('helpers.notification_title'), config('helpers.reservation_request'));
                if ($dentist->device_id) {
                    $message = config('helpers.reservation_request') . $event->id . ' بتاريخ ' . $event->event_date . ' لخدمة ' . $event->service->service_name_ar . ' الساعة ' . $event->start_time;
                    $details = ["message" => $message, 'event_id' => $event->id,];
                    $notificationData = ApiHelper::buildNotification(config('helpers.notification_title'), $message, $details);
                    ApiHelper::pushNotification(config('helpers.API_ACCESS_KEY'), $dentist->device_id, $notificationData);
                    $reservation[] = $event;
                }
            }
        }

        return $next($reservation);
    }

}
