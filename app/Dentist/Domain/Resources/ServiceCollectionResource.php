<?php

namespace App\Dentist\Domain\Resources;

use App\App\Http\Resources\BaseCollectionResource;
use App\App\Http\Resources\BaseResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ServiceCollectionResource extends BaseCollectionResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return array_merge([
            'Services' =>  CalendarResource::collection($this->collection),
        ],parent::toArray($request));
    }
}
