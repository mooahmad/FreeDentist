<?php

namespace App\Users\Domain\Policies;

use App\Users\Domain\Models\Dentist;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;
    public function createUser(Dentist $user)
    {
        return $user->hasRole('create-user');
    }
}
