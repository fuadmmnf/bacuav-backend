<?php

namespace App\Ship\Criterias;

use App\Ship\Parents\Criterias\Criteria;
use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;

class WithTrashedCriteria extends Criteria
{

    public function __construct()
    {
    }

    public function apply($model, PrettusRepositoryInterface $repository)
    {
        return $model->withTrashed();
    }
}
