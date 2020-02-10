<?php
namespace App\Users\Domain\Repositories;

use App\App\Domain\Repositories\Repository;
use App\App\Domain\Traits\IssueTokens;
use App\Users\Domain\Models\User;

class UserRepository extends Repository
{
    use IssueTokens;
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

}
