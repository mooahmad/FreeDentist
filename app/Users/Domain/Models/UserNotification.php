<?php

namespace App\Users\Domain\Models;

use Illuminate\Database\Eloquent\Model;


class UserNotification extends Model
{
    protected $table ='user_notifications';

    protected $fillable = ['title','mesg','user_id','dentist_id','event_id','service_id'];

}
