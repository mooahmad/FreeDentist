<?php

namespace App\Events\Domain\Services;

use App\App\Domain\Payloads\GenericPayload;
use App\App\Domain\Services\Service;
use App\Dentist\Domain\Repositories\DentistRepository;
use App\Events\Domain\Repositories\EventRepository;
use Illuminate\Support\Facades\Auth;

class DeleteDeviceService extends Service
{
    protected $events;
    protected $dentist;

    public function __construct(EventRepository $events, DentistRepository $dentist)
    {
        $this->events = $events;
        $this->dentist = $dentist;
    }

    public function handle($data = [])
    {
        if ($user = auth()->guard('api')->user()) {
            $update = $this->events->where('user_id', $user->id)->update(['device_id' => $data['device_id']]);
        } elseif ($user = auth()->guard('dentist')->user()) {
           $update = $this->dentist->find($user->id)->update(['device_id' => $data['device_id']]);
        }

        return new GenericPayload($user);
    }
}