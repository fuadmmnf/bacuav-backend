<?php

namespace App\Ship\Criterias;

use App\Ship\Parents\Criterias\Criteria;
use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;

class WithRelationCountCriteria extends Criteria
{
    public function __construct(
        private array $relations,
    ) {
    }

    public function apply($model, PrettusRepositoryInterface $repository)
    {
        return $model->withCount($this->relations);
    }
}
