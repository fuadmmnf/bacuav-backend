<?php

namespace App\Containers\AppSection\ElectionCandidateVote\Models;

use App\Containers\AppSection\ElectionCandidate\Models\ElectionCandidate;
use App\Containers\AppSection\User\Models\User;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ElectionCandidateVote extends ParentModel
{
    protected $fillable = [
        'election_candidate_id',
        'voter_id',
    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'ElectionCandidateVote';
    public function voter(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function electionCandidate(): BelongsTo
    {
        return $this->belongsTo(ElectionCandidate::class);
    }
}
