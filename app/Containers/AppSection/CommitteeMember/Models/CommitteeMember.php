<?php

namespace App\Containers\AppSection\CommitteeMember\Models;

use App\Ship\Parents\Models\Model as ParentModel;

class CommitteeMember extends ParentModel
{
    protected $fillable = [
        'committee_id',
        'name',
        'description',
        'photo',
    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'CommitteeMember';
}
