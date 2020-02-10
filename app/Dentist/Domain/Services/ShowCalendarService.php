<?php

namespace App\Dentist\Domain\Services;

use App\App\Domain\Payloads\GenericPayload;
use App\App\Domain\Services\Service;
use App\Dentist\Domain\Repositories\DentistCalendarRepository;
use App\Dentist\Domain\Repositories\DentistRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ShowCalendarService extends Service
{
    protected $dentistCalendar;

    public function __construct(DentistCalendarRepository $dentist)
    {
        $this->dentistCalendar = $dentist;
    }

    public function handle($data = [])
    {

        $times = $this->dentistCalendar->where('dentist_id', '=', auth()->id())
            ->where('start_date', '>=', Carbon::now())
            ->paginate(10);
        return (new GenericPayload($times));
    }
}