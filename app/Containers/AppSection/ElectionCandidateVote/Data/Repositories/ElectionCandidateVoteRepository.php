<?php

namespace App\Containers\AppSection\ElectionCandidateVote\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class ElectionCandidateVoteRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'election_candidate_id' => '=',
        // ...
    ];
}
