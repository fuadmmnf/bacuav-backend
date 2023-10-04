<?php

namespace App\Ship\Criterias;

use App\Ship\Parents\Criterias\Criteria;
use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;

class JoinByCriteria extends Criteria
{
    private string $table;
    private string $leftColumn;
    private string $rightColumn;

    public function __construct(string $table, string $leftColumn, string $rightColumn)
    {
        $this->table = $table;
        $this->leftColumn = $leftColumn;
        $this->rightColumn = $rightColumn;
    }

    public function apply($model, PrettusRepositoryInterface $repository)
    {
        return $model->join($this->table, $this->leftColumn, '=',  $this->rightColumn);
    }
}
