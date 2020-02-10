<?php

namespace App\Dentist\Domain\Policies;

use App\Dentist\Domain\Models\Dentist;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;
    public function createUser(Dentist $user)
    {
        return $user->hasRole('create-user');
    }
}
