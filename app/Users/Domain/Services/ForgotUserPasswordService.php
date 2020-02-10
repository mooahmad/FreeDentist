<?php

namespace App\Users\Domain\Services;

use App\App\Domain\Payloads\GenericPayload;
use App\App\Domain\Services\Service;
use App\Users\Domain\Mails\ResetPassword;
use App\Users\Domain\Repositories\ActivationRepository;
use App\Users\Domain\Repositories\PasswordResetRepository;
use App\Users\Domain\Repositories\ReminderRepository;
use App\Users\Domain\Repositories\UserRepository;
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
        $passowrd=    $this->users->newPassword($user);
            return new GenericPayload([
                'message' => 'Token has been sent to your mail,' . $user->first_name . 'and password is '. $passowrd,
            ]);
    }
}
