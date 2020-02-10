<?php

namespace App\Events\Domain\Resources;

use App\Dentist\Domain\Resources\DentistResource;
use App\Users\Domain\Resources\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' =>$this->id,
            'event_date' => $this->event_date,
            $this->mergeWhen($this->whenLoaded('user'), [
                'user' => (new UserResource($this->user))
            ]),
            $this->mergeWhen($this->whenLoaded('dentist'), [
                'dentist' => (new DentistResource($this->dentist))
            ]),
            $this->mergeWhen($this->whenLoaded('service'), [
                'service'=>$this->service,
            ]),

        ];
    }
}