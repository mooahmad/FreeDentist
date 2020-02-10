<?php

namespace App\Followers\Domain\Models;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    protected $table = 'followers';

    protected $fillable = ['name','nationality','birthdate','gender','created_at','user_id','relation'];
}
