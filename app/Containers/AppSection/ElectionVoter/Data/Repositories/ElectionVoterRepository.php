<?php

namespace App\Containers\AppSection\ElectionVoter\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class ElectionVoterRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'election_id' => '=',
        'voter_id' => '=',
    ];
}
