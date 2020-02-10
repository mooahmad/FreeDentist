<?php

namespace App\Dentist\Domain\Services;

use App\App\Domain\Payloads\GenericPayload;
use App\App\Domain\Services\Service;
use App\Dentist\Domain\Models\Dentist;
use App\Dentist\Domain\Models\DentistCalendar;
use App\Dentist\Domain\Repositories\DentistCalendarRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SearchReservationService extends Service
{
    protected $dentist;

    public function __construct(DentistCalendarRepository $dentist)
    {
        $this->dentist = $dentist;
    }

    public function handle($data = [])
    {
        $date = Carbon::parse($data['date'])->toDateString();
        $times = $this->dentist->orderBy('id', 'desc')
            ->where('start_date', '=', $date)
            ->where('end_date', '>', $date)
            ->where('hospital_id', '=', $data['hospital_id'])
            ->where('service_id', '=', $data['service_id'])
            ->groupBy('start_date','id')
            ->get();
      return new GenericPayload($times);
    }
}