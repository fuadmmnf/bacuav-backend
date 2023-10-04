<?php

namespace App\Ship\Criterias;

use App\Ship\Parents\Criterias\Criteria;
use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;

class ThisWithinThatCriteria extends Criteria
{
    public function __construct(
        private string $field,
        private string $values,
    ) {
    }

    public function apply($model, PrettusRepositoryInterface $repository)
    {
        return $model->whereIn($this->field, $this->values);
    }
}
