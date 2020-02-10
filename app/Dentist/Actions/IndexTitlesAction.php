<?php

namespace App\Dentist\Actions;

use App\Dentist\Domain\Services\IndexTitlesService;
use App\Dentist\Responders\IndexTitlesResponder;

class IndexTitlesAction 
{
    public function __construct(IndexTitlesResponder $responder, IndexTitlesService $services) 
    {
        $this->responder = $responder;
        $this->services = $services;
    }
    public function __invoke() 
    {
        return $this->responder->withResponse(
            $this->services->handle()
        )->respond();
    }
}