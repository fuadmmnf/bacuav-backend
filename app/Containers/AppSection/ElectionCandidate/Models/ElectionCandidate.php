<?php

namespace App\Containers\AppSection\ElectionCandidate\Models;

use App\Ship\Parents\Models\Model as ParentModel;

class ElectionCandidate extends ParentModel
{
    protected $fillable = [

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
