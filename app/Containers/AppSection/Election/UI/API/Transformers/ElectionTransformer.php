<?php

namespace App\Containers\AppSection\Election\UI\API\Transformers;

use App\Containers\AppSection\Election\Models\Election;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;
use League\Fractal\Resource\Collection;

class ElectionTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [
//        'children',
    ];

    protected array $availableIncludes = [
        'children',
    ];

    public function includeChildren(Election $election): Collection
    {
        return $this->collection($election->children, new ElectionTransformer());
    }

    public function transform(Election $election): array
    {
        $response = [
            'object' => $election->getResourceKey(),
            'id' => $election->getHashedKey(),
            'title' => $election->title,
            'description' => $election->description,
            'start_time' => $election->start_time,
            'end_time' => $election->end_time,
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
