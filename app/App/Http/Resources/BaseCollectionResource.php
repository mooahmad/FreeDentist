<?php

namespace App\App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class BaseCollectionResource extends ResourceCollection
{


    public function toArray($request)
    {
        return [
            'pagination' => [
                'total' => $this->total(),
                'count' => $this->count(),
                'per_page' => $this->perPage(),
                'current_page' => $this->currentPage(),
                'total_pages' => $this->lastPage()
            ],
        ];
    }


//    public function withResponse($request, $response)
//    {
//        $jsonResponse = json_decode($response->getContent(), true);
//        unset($jsonResponse['links'], $jsonResponse['meta']);
//        $response->setContent(json_encode($jsonResponse));
//    }
}
