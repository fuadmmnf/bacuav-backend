<?php

namespace App\Containers\AppSection\ElectionCandidate\Models;

use App\Ship\Parents\Models\Model as ParentModel;

class ElectionCandidate extends ParentModel
{
    protected $fillable = [
        'election_id',
        'candidate_id',
        'description',
    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'ElectionCandidate';
}
