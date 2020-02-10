<?php

namespace App\Dentist\Domain\Services;

use App\App\Domain\Payloads\GenericPayload;
use App\App\Domain\Services\Service;
use App\Dentist\Domain\Mails\ResetPassword;
use App\Dentist\Domain\Repositories\ActivationRepository;
use App\Dentist\Domain\Repositories\PasswordResetRepository;
use App\Dentist\Domain\Repositories\ReminderRepository;
use App\Dentist\Domain\Repositories\UserRepository;
use Mail;

class ForgotUserPasswordService extends Service
{
    protected $users;

    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    public function handle($data = [])
    {
        $user = $this->users->where('mobile', $data['mobile'])->firstOrFail();

        if ($user) {
        $passowrd=    $this->users->newPassword($user);
            return new GenericPayload([
                'message' => 'Token has been sent to your mail,' . $user->first_name . 'and password is '. $passowrd,
            ]);
        }
        return new GenericPayload([
            'message' => 'It looks like you did not activate your account yet.',
        ], 422);
    }
}
