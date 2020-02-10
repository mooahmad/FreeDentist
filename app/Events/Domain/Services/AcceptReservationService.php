<?php

namespace App\Events\Domain\Services;

use App\App\Domain\Helpers\ApiHelper;
use App\App\Domain\Payloads\FailedPayload;
use App\App\Domain\Payloads\GenericPayload;
use App\App\Domain\Services\Service;
use App\Dentist\Domain\Repositories\DentistCalendarRepository;
use App\Events\Domain\Models\Event;
use App\Events\Domain\Repositories\EventRepository;
use App\Users\Domain\Models\Participant;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
//use Lexx\ChatMessenger\Models\Message;
use Lexx\ChatMessenger\Models\Thread;
use App\Users\Domain\Models\Message;

class AcceptReservationService extends Service
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
        $event->update(['status' => 1, 'notification' => 1, 'dentist_id' => Auth::id()]);
        $dentistCalendar = $this->calendar->dentistCalendar($event->only(['dentist_id', 'treatment_id', 'event_date', 'hospital_id', 'start_time']));
        if ($dentistCalendar) $dentistCalendar->update(['status' => 1, 'flag' => 1]);
        $events = $this->events->where('hospital_id', $event->hospital_id)
            ->where('treatment_id', $event->treatment_id)->where('event_date', $event->event_date)
            ->where('dentist_id', $event->dentist_id)->where('status', 0)
            ->get();
        // Delete useless events after accept
        foreach ($events as $eventDetails) {
            $eventDetails->delete();
        }
        $thread = Thread::create(['subject' => config('helpers.dentist.conversation') . auth()->user()->name, 'start_date' => Carbon::now()->toDateString(), 'end_date' => $event->event_date]);
        // Message
        Message::create(['thread_id' => $thread->id, 'user_id' => auth()->id(), 'type' => 1, 'body' => config('helpers.dentist.start_conversation'),]);
        // Sender
        Participant::create(['thread_id' => $thread->id, 'user_id' => $event->user_id, 'type' => '2', 'last_read' => Carbon::now()->toDateString(),]);
        Participant::create(['thread_id' => $thread->id, 'user_id' => auth()->id(), 'type' => '1', 'last_read' => Carbon::now()->toDateString(),]);
        ApiHelper::saveNotification($event->only(['id', 'user_id', 'treatment_id']), config('helpers.notification_title'), config('helpers.dentist.accept'));
        if ($event->device_id) {
            $message = config('helpers.dentist.accept') . $event->id . ' بتاريخ ' . $event->event_date . ' لخدمة ' . $event->service->service_name_ar . config('helpers.date') . $event->start_time;
            $details = ["message" => $message, 'event_id' => $event->id,];
            $notificationData = ApiHelper::buildNotification(config('helpers.notification_title'), $message, $details);
            ApiHelper::pushNotification(config('helpers.API_ACCESS_KEY'), $event->device_id, $notificationData);
        }
        return new GenericPayload(trans('api.success'));
    }
}