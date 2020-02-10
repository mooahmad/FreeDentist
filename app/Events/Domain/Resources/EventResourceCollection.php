<?php

namespace App\Events\Domain\Resources;

use App\App\Http\Resources\BaseCollectionResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class EventResourceCollection extends BaseCollectionResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return array_merge([
            'data' => EventResource::collection($this->collection),
        ],parent::toArray($request));
    }
}