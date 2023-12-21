<?php

namespace App\Containers\AppSection\ElectionVoter\UI\API\Transformers;

use App\Containers\AppSection\ElectionVoter\Models\ElectionVoter;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class ElectionVoterTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(ElectionVoter $electionvoter): array
    {
        $response = [
            'object' => $electionvoter->getResourceKey(),
            'id' => $electionvoter->getHashedKey(),
        ];

        return $this->ifAdmin([
            'real_id' => $electionvoter->id,
            'created_at' => $electionvoter->created_at,
            'updated_at' => $electionvoter->updated_at,
            'readable_created_at' => $electionvoter->created_at->diffForHumans(),
            'readable_updated_at' => $electionvoter->updated_at->diffForHumans(),
            // 'deleted_at' => $electionvoter->deleted_at,
        ], $response);
    }
}
