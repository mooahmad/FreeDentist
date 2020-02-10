<?php

namespace App\Dentist\Domain\Resources;

use App\App\Http\Resources\BaseCollectionResource;
use App\App\Http\Resources\BaseResource;
use App\Dentist\Responders\ServicesResponder;
use App\Service\Domain\Resources\ServiceResource;
use Faker\Provider\Base;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CalendarResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'calendar_id' =>$this->id,
             'hospital_id'=>$this->hospital_id,
             'service' =>ServiceResource::collection($this->service),
             'dentist_id' =>$this->dentist_id,
        ];
    }
}
