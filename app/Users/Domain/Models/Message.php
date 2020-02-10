<?php
namespace App\Users\Domain\Models;

use Lexx\ChatMessenger\Models\Message as BaseModel;

class Message extends BaseModel
{

    protected $fillable = ['thread_id', 'user_id', 'body', 'type'];
}