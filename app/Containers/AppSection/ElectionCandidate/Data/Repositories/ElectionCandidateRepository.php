<?php

namespace App\Containers\AppSection\ElectionCandidate\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class ElectionCandidateRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
