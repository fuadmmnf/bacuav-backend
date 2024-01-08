<?php

namespace App\Containers\AppSection\Committee\Models;

use App\Containers\AppSection\CommitteeMember\Models\CommitteeMember;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Committee extends ParentModel
{
    protected $fillable = [
        'name',
        'description',
        'year',
    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Committee';

    public function committeeMembers(): HasMany
    {
        return $this->hasMany(CommitteeMember::class);
    }
}
