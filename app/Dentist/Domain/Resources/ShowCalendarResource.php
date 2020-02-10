<?php

namespace App\Dentist\Domain\Resources;

use App\App\Http\Resources\BaseResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ShwoCalendarResource extends ResourceCollection
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
            'times' => $this->collection
        ];
    }
}
