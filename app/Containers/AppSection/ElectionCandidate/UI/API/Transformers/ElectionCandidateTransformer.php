<?php

namespace App\Containers\AppSection\ElectionCandidate\UI\API\Transformers;

use App\Containers\AppSection\ElectionCandidate\Models\ElectionCandidate;
use App\Containers\AppSection\User\UI\API\Transformers\UserTransformer;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;
use League\Fractal\Resource\Item;
use League\Fractal\Resource\Primitive;

class ElectionCandidateTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [
    ];

    protected array $availableIncludes = [
        'candidate',
    ];

    public function includeCandidate(ElectionCandidate $electionCandidate): Item|Primitive
    {
        return $this->nullableItem($electionCandidate->candidate, new UserTransformer());
    }



    public function transform(ElectionCandidate $electioncandidate): array
    {

        $response = [
            'object' => $electioncandidate->getResourceKey(),
            'id' => $electioncandidate->getHashedKey(),
            'name' => $electioncandidate->name,
            'photo' => $electioncandidate->photo,
            'description' => $electioncandidate->description,
        ];

        return $this->ifAdmin([
            'vote_counts' => $electioncandidate->votes_count,
            'real_id' => $electioncandidate->id,
            'created_at' => $electioncandidate->created_at,
            'updated_at' => $electioncandidate->updated_at,
            'readable_created_at' => $electioncandidate->created_at->diffForHumans(),
            'readable_updated_at' => $electioncandidate->updated_at->diffForHumans(),
            // 'deleted_at' => $electioncandidate->deleted_at,
        ], $response);
    }
}
