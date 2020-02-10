<?php
namespace App\Dentist\Domain\Models;

use App\Service\Domain\Models\Service;
use App\Hospital\Domain\Models\Hospital;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class DentistCalendar extends Model
{
    protected $table ='dentist_calanders';

    protected $fillable = ['hospital_id', 'service_id', 'start_date', 'end_date','day', 'start_time', 'end_time', 'status', 'flag','dentist_id'];

    public function dentist()
    {
        return $this->belongsTo(Dentist::class);
    }

    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function isSameDates($start,$end){
        return $start == $end ;
    }


    public function setStartDateAttribute($value)
    {
        $this->attributes['start_date'] = Carbon::parse($value)->format('Y-m-d');
    }

    public function setEndDateAttribute($value)
    {
        $this->attributes['end_date'] = Carbon::parse($value)->format('Y-m-d');
    }

}
