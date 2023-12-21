<?php

namespace App\Containers\AppSection\Category\UI\API\Transformers;

use Apiato\Core\Traits\HashIdTrait;
use App\Containers\AppSection\Category\Models\Category;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;
use League\Fractal\Resource\Collection;

class CategoryTransformer extends ParentTransformer
{
    use HashIdTrait;
    protected array $defaultIncludes = [
//        'children',
    ];

    protected array $availableIncludes = [
        'children',
    ];

    public function includeChildren(Category $category): Collection
    {
        return $this->collection($category->children, new CategoryTransformer());
    }

    public function transform(Category $resource): array
    {
        $response = [
//            'object' => $resource->getResourceKey(),
            'id' => $resource->getHashedKey(),
            'name' => $resource->name,
            'type' => $resource->type,
            'parent_id' => $this->encode($resource->parent_id),
//            'descendents' => $resource->descendents ?? [],
        ];

        return $this->ifAdmin([
            'real_id' => $resource->id,
            'created_at' => $resource->created_at,
            'updated_at' => $resource->updated_at,
            'readable_created_at' => $resource->created_at->diffForHumans(),
            'readable_updated_at' => $resource->updated_at->diffForHumans(),
            // 'deleted_at' => $resource->deleted_at,
        ], $response);
    }
}
