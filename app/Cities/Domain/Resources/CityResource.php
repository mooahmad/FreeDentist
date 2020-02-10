<?php

namespace App\Cities\Domain\Resources;

use App\App\Http\Resources\BaseResource;
use Illuminate\Support\Facades\App;
use phpDocumentor\Reflection\Types\Parent_;

class CityResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $cities = [];
        foreach ($this->resource as $grade) {
            $cities[] = ([
                'id' => $grade->id,
                'name' => $grade->{'city_name_'.App::getLocale()},
                'created_at_human' => $grade->created_at->diffForHumans(),
                'updated_at_human' => $grade->updated_at->diffForHumans(),
            ]);
        }
        return $cities;
    }
}
