<?php

namespace App\Containers\AppSection\ElectionCandidate\UI\API\Transformers;

use App\Containers\AppSection\ElectionCandidate\Models\ElectionCandidate;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class ElectionCandidateTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(ElectionCandidate $electioncandidate): array
    {
        $response = [
            'object' => $electioncandidate->getResourceKey(),
            'id' => $electioncandidate->getHashedKey(),
        ];

        return $this->ifAdmin([
            'real_id' => $electioncandidate->id,
            'created_at' => $electioncandidate->created_at,
            'updated_at' => $electioncandidate->updated_at,
            'readable_created_at' => $electioncandidate->created_at->diffForHumans(),
            'readable_updated_at' => $electioncandidate->updated_at->diffForHumans(),
            // 'deleted_at' => $electioncandidate->deleted_at,
        ], $response);
    }
}
