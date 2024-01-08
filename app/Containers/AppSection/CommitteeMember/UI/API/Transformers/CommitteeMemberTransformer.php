<?php

namespace App\Containers\AppSection\CommitteeMember\UI\API\Transformers;

use Apiato\Core\Traits\HashIdTrait;
use App\Containers\AppSection\CommitteeMember\Models\CommitteeMember;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class CommitteeMemberTransformer extends ParentTransformer
{
    use HashIdTrait;
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(CommitteeMember $committeemember): array
    {
        $response = [
            'object' => $committeemember->getResourceKey(),
            'id' => $committeemember->getHashedKey(),
            'committee_id' => $this->encode($committeemember->committee_id),
            'name' => $committeemember->name,
            'description' => $committeemember->description,
            'photo' => $committeemember->photo,
        ];

        return $this->ifAdmin([
            'real_id' => $committeemember->id,
            'created_at' => $committeemember->created_at,
            'updated_at' => $committeemember->updated_at,
            'readable_created_at' => $committeemember->created_at->diffForHumans(),
            'readable_updated_at' => $committeemember->updated_at->diffForHumans(),
            // 'deleted_at' => $committeemember->deleted_at,
        ], $response);
    }
}
