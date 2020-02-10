<?php

namespace App\Dentist\Domain\Services;

use App\App\Domain\Payloads\GenericPayload;
use App\App\Domain\Services\Service;
use App\Dentist\Domain\Models\DentistCalendar;
use App\Dentist\Domain\Repositories\DentistCalendarRepository;
use App\Dentist\Domain\Repositories\DentistRepository;
use App\Dentist_calander;

class DeleteCalendarService extends Service
{
    protected $calendar;

    public function __construct(DentistCalendarRepository $calendar)
    {
        $this->calendar = $calendar;
    }

    public function handle($data = [])
    {
        $calendar = $this->calendar->getById($data['id']);
        if ($calendar) {
            $calendar->delete();
            return new GenericPayload(trans('api.success'));
        }
        return new GenericPayload(trans('api.not_found'));
    }
}