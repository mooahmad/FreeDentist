<?php
namespace App\Dentist\Domain\Repositories;

use App\App\Domain\Repositories\Repository;
use App\App\Domain\Traits\Helper;
use App\App\Domain\Traits\IssueTokens;
use App\Dentist\Domain\Models\Dentist;
use Illuminate\Database\Eloquent\Model;


class DentistRepository extends Repository
{
    use IssueTokens;
    protected $model;

    public function __construct(Dentist $model)
    {
        $this->model = $model;
    }

}
