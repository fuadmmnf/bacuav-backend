<?php

namespace App\Ship\Criterias;

use App\Ship\Parents\Criterias\Criteria;
use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;

class RandomOrderCriteria extends Criteria
{

    private string $seed;

    public function __construct(?string $seed = null)
    {
        $this->seed = ('' . $seed?? rand());
    }


    public function apply($model, PrettusRepositoryInterface $repository)
    {
        return $model->inRandomOrder($this->seed);
    }
}
