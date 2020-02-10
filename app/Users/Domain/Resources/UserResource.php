<?php

namespace App\Users\Domain\Resources;

use App\App\Http\Resources\BaseResource;

class UserResource extends BaseResource
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
            'otp'=>$this->otp,
        ], parent::toArray($request));
    }
}
