<?php

namespace App\Containers\AppSection\ElectionVoter\Models;

use App\Ship\Parents\Models\Model as ParentModel;

class ElectionVoter extends ParentModel
{
    protected $fillable = [
        'election_id',
        'voter_id',
    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'ElectionVoter';
}
