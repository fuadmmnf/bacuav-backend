<?php

namespace App\Containers\AppSection\Election\UI\API\Transformers;

use App\Containers\AppSection\Election\Models\Election;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class ElectionTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(Election $election): array
    {
        $response = [
            'object' => $election->getResourceKey(),
            'id' => $election->getHashedKey(),
        ];

        return $this->ifAdmin([
            'real_id' => $election->id,
            'created_at' => $election->created_at,
            'updated_at' => $election->updated_at,
            'readable_created_at' => $election->created_at->diffForHumans(),
            'readable_updated_at' => $election->updated_at->diffForHumans(),
            // 'deleted_at' => $election->deleted_at,
        ], $response);
    }
}
