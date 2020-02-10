<?php

namespace App\Dentist\Domain\Repositories;

use App\App\Domain\Repositories\Repository;
use App\App\Domain\Traits\IssueTokens;
use App\Dentist\Domain\Models\DentistCalendar;
use Carbon\Carbon;


class DentistCalendarRepository extends Repository
{
    protected $model;

    public function __construct(DentistCalendar $model)
    {
        $this->model = $model;
    }

    public function timeExist($data = [])
    {
        return $this->model->where('hospital_id', $data['hospital_id'])->where('service_id', $data['service_id'])->
        where('star
        t_date', Carbon::parse($data['start_date']))->where('start_time', $data['start_time'])->first();
    }

    public function dentistCalendar($data = [])
    {
        $service_id = isset($data['treatment_id']) ? $data['treatment_id'] : $data['service_id'];
        $start_date = isset($data['event_date']) ? $data['event_date'] : $data['start_date'];
        return $this->model->where('dentist_id', $data['dentist_id'])->where('hospital_id', $data['hospital_id'])->where('service_id', $service_id)->
        where('start_date', Carbon::parse($start_date))->where('start_time', $data['start_time'])->first();
    }
}
