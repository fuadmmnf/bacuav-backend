<?php

namespace App\Ship\Criterias;

use App\Ship\Parents\Criterias\Criteria;
use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;

class WithRelationCriteria extends Criteria
{
    public function __construct(
        private array $relations,
    ) {
    }

    public function apply($model, PrettusRepositoryInterface $repository)
    {
        return $model->with($this->relations);
    }
}
