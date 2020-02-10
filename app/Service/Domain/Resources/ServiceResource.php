<?php

namespace App\Service\Domain\Resources;

use App\App\Http\Resources\BaseCollectionResource;
use App\App\Http\Resources\BaseResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;

class ServiceResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
       return ['id'=>$this->id,
           'name'=> $this->{'service_name_'.App::getLocale()},
           ];
    }
}