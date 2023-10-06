<?php

namespace App\Containers\AppSection\Election\Models;

use App\Ship\Parents\Models\Model as ParentModel;

class Election extends ParentModel
{
    protected $fillable = [
        'title',
        'description',
        'start_time',
        'end_time',
        'publish_time',
        'status',
    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Election';
}
