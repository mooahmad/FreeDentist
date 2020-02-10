<?php

namespace App\Dentist\Domain\Services;

use App\App\Domain\Payloads\GenericPayload;
use App\App\Domain\Services\Service;
use App\Dentist\Domain\Repositories\DentistCalendarRepository;
use App\Dentist\Domain\Repositories\DentistRepository;
use App\Dentist_calander;
use Carbon\Carbon;

class DentistCalendarUpdateService extends Service
{
    protected $calendar;

    public function __construct(DentistCalendarRepository $calendar)
    {
        $this->calendar = $calendar;
    }

    public function handle($data = [])
    {
        $calendar = $this->calendar->getById($data['calander_id']);

        if ($isSameDates = $this->calendar->isSameDates($data['start_date'], $data['end_date'])) {
            $data['day'] = Carbon::parse($data['start_date'])->format('l');
            $data['end_date'] = Carbon::parse($data['start_date'])->addDay();
        }
        $calendar->update([$data]);
        return new GenericPayload(trans('api.success'));
    }
}