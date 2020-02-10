<?php


namespace App\Users\Domain\Models;

use Lexx\ChatMessenger\Models\Participant as BaseModel;

class Participant extends BaseModel
{
    protected $fillable = ['thread_id', 'user_id', 'last_read', 'starred','type'];

}