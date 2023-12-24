<?php

namespace App\Containers\AppSection\ElectionCandidate\Models;

use App\Containers\AppSection\ElectionCandidateVote\Models\ElectionCandidateVote;
use App\Containers\AppSection\User\Models\User;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ElectionCandidate extends ParentModel
{
    protected $fillable = [
        'election_id',
        'candidate_id',
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
    protected string $resourceKey = 'ElectionCandidate';

    public function candidate(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function votes(): HasMany
    {
        return $this->hasMany(ElectionCandidateVote::class);
    }
}
