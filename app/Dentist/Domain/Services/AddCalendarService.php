<?php

namespace App\Dentist\Domain\Services;

use App\App\Domain\Helpers\Dates;
use App\App\Domain\Payloads\GenericPayload;
use App\App\Domain\Payloads\JsonPayload;
use App\App\Domain\Services\Service;
use App\Dentist\Domain\Models\DentistCalendar;
use App\Dentist\Domain\Repositories\DentistCalendarRepository;
use App\Dentist\Domain\Repositories\DentistRepository;
use Carbon\Carbon;

class AddCalendarService extends Service
{
    protected $dentist;

    public function __construct(DentistCalendarRepository $dentist)
    {
        $this->dentist = $dentist;
    }

    public function handle($data = [])
    {
        $days = [];
        if ($isSameDates = $this->dentist->isSameDates($data['start_date'], $data['end_date'])) {
            $data['day'] = Carbon::parse($data['start_date'])->format('l');
            $data['end_date'] = Carbon::parse($data['start_date'])->addDay();
            if ($exist = $this->dentist->timeExist($data)) {
                return new JsonPayload;
            }
            $this->dentist->create($data);
            return new GenericPayload(['message' =>trans('api.success')]);
        }
        if (isset($isSameDates) && !$isSameDates) {
            $dates = (new Dates())->generateDateRange($data['start_date'], $data['end_date']);
            foreach ($dates as $date) {
                if ($data['day'] == (new Dates())->getDay($date)) {
                    $data['start_date'] = $date;
                    $data['end_date'] = Carbon::parse($date)->addDay();
                    if (!$this->dentist->timeExist($data)) {
                        $days[] = $this->dentist->create($data);
                    }
                }

            }
        }
        return new GenericPayload(!empty($days) ? ['message' =>trans('api.success')]:['message'=>trans('api.empty')]);
    }
}