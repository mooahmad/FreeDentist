<?php

namespace App\Dentist\Domain\Resources;

use App\App\Http\Resources\BaseResource;

class DentistResource extends BaseResource
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
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
        ], parent::toArray($request));
    }
}
