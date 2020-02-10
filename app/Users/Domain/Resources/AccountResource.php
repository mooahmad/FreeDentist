<?php

namespace App\Users\Domain\Resources;

use App\App\Http\Resources\BaseResource;
use Illuminate\Support\Facades\App;

class AccountResource extends BaseResource
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
            'name' => $this->name,
            'email' => $this->email,
            'mobile'=>$this->mobile,
            $this->mergeWhen($this->whenLoaded('country'), [
                'nationality'=> $this->country->{'nationality_name_'.App::getLocale()}
            ]),
            'followers' =>$this->followers()->count()
        ], parent::toArray($request));
    }
}
