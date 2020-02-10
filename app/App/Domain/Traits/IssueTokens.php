<?php

namespace App\App\Domain\Traits;

Use App\Dentist\Domain\Models\Dentist;
use App\Users\Domain\Models\User;
use Illuminate\Database\Eloquent\Model;
use Str;

trait IssueTokens
{


    /**
     * Generate a "random" alpha-numeric string.
     *
     * Should not be considered sufficient for cryptography, etc.
     *
     * @param  int $length
     * @return string
     */
    public static function quickRandom($length = 6, $onlyDigits = false)
    {
        $pool = '0123456789';
        if ($onlyDigits)
            $pool = '0123456789';

        return substr(str_shuffle(str_repeat($pool, $length)), 0, $length);
    }


    public function hasOrCreateToken(User $user)
    {
        return $this->generateToken($user);
    }
    /**
     * Check if the user has completed.
     *
     *
     * @param Dentist $user
     * @return string
     */
    public function newPassword(User $user)
    {
        $new_passord = $this->quickRandom(8);
        $user->password = bcrypt($new_passord);
        $user->save();
        return $new_passord;
    }


    public function complete($data = [], User $user)
    {
        $user->active = 1;
        $user->save();
        return $user;
    }
    public function activeDentist($data = [], Dentist $user)
    {
        $user->active = 1;
        $user->save();
        return $user;
    }

    /**
     *  generates token for specific user.
     *
     * @param Dentist $user
     * @return mixed
     */
    public function generateToken(Model $user)
    {
        return $user->generateAuthToken();
    }

    /**
     * removes expired records which aren't completed yet.
     *
     * @param int|null $days
     *
     * @return bool
     */
    public function removeExpired(int $days = null)
    {
        return $this->where(['completed_at' => null, ['created_at', '<=', now()->subDays($days ?? config("users.{$this->process}.expiration"))]])->delete();
    }
}
