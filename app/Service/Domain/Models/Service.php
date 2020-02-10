<?php

namespace App\Service\Domain\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';

    protected $fillable =['service_name_ar','service_name_en'];
}
