<?php

namespace App\Containers\AppSection\Otp\Models;

use App\Ship\Parents\Models\Model as ParentModel;
use App\Ship\Traits\Uuids;

class Otp extends ParentModel
{
    use Uuids;
    protected $fillable = [
        'identifier',
        'code',
    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Otp';
}
