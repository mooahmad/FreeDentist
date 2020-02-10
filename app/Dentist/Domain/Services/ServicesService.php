<?php

namespace App\Dentist\Domain\Services;

use App\App\Domain\Payloads\GenericPayload;
use App\App\Domain\Services\Service;
use App\Dentist\Domain\Repositories\DentistCalendarRepository;
use App\Dentist\Domain\Repositories\DentistRepository;
class ServicesService extends Service 
{
    protected $calendar;
    public function __construct(DentistCalendarRepository $calendar)
    {
        $this->calendar = $calendar;
    }
    public function handle($data = []) 
    {
        $calendar = $this->calendar->where('dentist_id',auth()->id())->get();

        return new GenericPayload($calendar);
    }
}