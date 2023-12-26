<?php

namespace App\Containers\AppSection\Election\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class ElectionRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'title' => 'like',
        'status' => 'in',

        // ...
    ];
}
