<?php

namespace App\Containers\AppSection\Committee\UI\API\Transformers;

use App\Containers\AppSection\Committee\Models\Committee;
use App\Containers\AppSection\CommitteeMember\Models\CommitteeMember;
use App\Containers\AppSection\CommitteeMember\UI\API\Transformers\CommitteeMemberTransformer;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class CommitteeTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [
        'committeeMembers'
    ];

    public function includeCommitteeMembers(Committee $committee): \League\Fractal\Resource\Collection
    {
        return $this->collection($committee->committeeMembers, new CommitteeMemberTransformer());
    }
    public function transform(Committee $committee): array
    {
        $response = [
            'object' => $committee->getResourceKey(),
            'id' => $committee->getHashedKey(),
            'name' => $committee->name,
            'description' => $committee->description,
            'year' => $committee->year,
        ];

        return $this->ifAdmin([
            'real_id' => $committee->id,
            'created_at' => $committee->created_at,
            'updated_at' => $committee->updated_at,
            'readable_created_at' => $committee->created_at->diffForHumans(),
            'readable_updated_at' => $committee->updated_at->diffForHumans(),
            // 'deleted_at' => $committee->deleted_at,
        ], $response);
    }
}
