<?php

namespace App\Events\Domain\Models;

use App\Dentist\Domain\Models\Dentist;
use App\Service\Domain\Models\Service;
use App\Users\Domain\Models\User;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';

    protected $fillable = ['title','start_date','end_date','user_id','dentist_id','treatment_id','hospital_id','photo','is_diseases','diseases','is_drugs','drugs','status','follower_id','reason','start_time','end_time','event_date'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function dentist(){
        return $this->belongsTo(Dentist::class);
    }

    public function service(){
        return $this->belongsTo(Service::class,'treatment_id');
    }
}
