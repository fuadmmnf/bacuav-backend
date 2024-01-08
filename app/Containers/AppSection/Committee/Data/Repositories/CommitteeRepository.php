<?php

namespace App\Containers\AppSection\Committee\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class CommitteeRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'name' => 'like',
        'year' => '=',
    ];
}
