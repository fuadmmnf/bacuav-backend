<?php

namespace App\Containers\AppSection\ElectionCandidateVote\Models;

use App\Ship\Parents\Models\Model as ParentModel;

class ElectionCandidateVote extends ParentModel
{
    protected $fillable = [
        'election_candidate_id',
        'candidate_id',
    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'ElectionCandidateVote';
}
