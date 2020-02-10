<?php

namespace App\Nationality\Domain\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;

class NationalityResource extends JsonResource 
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request) 
    {
        $nationalities = [];
        foreach ($this->resource as $item) {
            $nationalities[] = ([
                'id' => $item->id,
                'name' => $item->{'nationality_name_'.App::getLocale()},
                'created_at_human' => $item->created_at == null ? null:$item->created_at->diffForHumans(),
                'updated_at_human' => $item->updated_at == null ? null:$item->updated_at->diffForHumans()

            ]);
        }
        return $nationalities;
    }
}