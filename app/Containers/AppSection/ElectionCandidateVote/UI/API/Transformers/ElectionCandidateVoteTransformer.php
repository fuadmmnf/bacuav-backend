<?php

namespace App\Containers\AppSection\ElectionCandidateVote\UI\API\Transformers;

use App\Containers\AppSection\ElectionCandidateVote\Models\ElectionCandidateVote;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class ElectionCandidateVoteTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(ElectionCandidateVote $electioncandidatevote): array
    {
        $response = [
            'object' => $electioncandidatevote->getResourceKey(),
            'id' => $electioncandidatevote->getHashedKey(),
        ];

        return $this->ifAdmin([
            'real_id' => $electioncandidatevote->id,
            'created_at' => $electioncandidatevote->created_at,
            'updated_at' => $electioncandidatevote->updated_at,
            'readable_created_at' => $electioncandidatevote->created_at->diffForHumans(),
            'readable_updated_at' => $electioncandidatevote->updated_at->diffForHumans(),
            // 'deleted_at' => $electioncandidatevote->deleted_at,
        ], $response);
    }
}
