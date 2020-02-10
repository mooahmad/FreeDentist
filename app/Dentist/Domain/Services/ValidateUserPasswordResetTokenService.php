<?php

namespace App\Dentist\Domain\Services;

use App\App\Domain\Payloads\GenericPayload;
use App\App\Domain\Payloads\UnauthorizedPayload;
use App\App\Domain\Services\Service;
use App\Dentist\Domain\Models\Dentist;
use App\Dentist\Domain\Repositories\ActivationRepository;
use App\Dentist\Domain\Repositories\PasswordResetRepository;
use App\Dentist\Domain\Repositories\ReminderRepository;
use App\Dentist\Domain\Repositories\UserRepository;
class ValidateUserPasswordResetTokenService extends Service
{
    protected $users;
    protected $passwordReset;
    protected $activations;
    public function __construct(UserRepository $users, ActivationRepository $activations, PasswordResetRepository $passwordReset)
    {
        $this->users = $users;
        $this->passwordReset = $passwordReset;
        $this->activations = $activations;
    }
    public function handle(Dentist $user = null, $token = null)
    {
        if ($this->activations->completed($user)) {
            $this->passwordReset->hasToken($user, $token);
            return new GenericPayload([
                'message' => 'Alright ' . $user->first_name . ' Let\'s setup a new password',
            ]);
        }
        return new UnauthorizedPayload([
            'message' => 'You have not activated your account',
        ]);
    }
}
