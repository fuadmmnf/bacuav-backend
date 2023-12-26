<?php

namespace App\Containers\AppSection\User\UI\API\Transformers;

use Apiato\Core\Traits\HashIdTrait;
use App\Containers\AppSection\Authorization\UI\API\Transformers\PermissionTransformer;
use App\Containers\AppSection\Authorization\UI\API\Transformers\RoleTransformer;
use App\Containers\AppSection\Category\UI\API\Transformers\CategoryTransformer;
use App\Containers\AppSection\User\Models\User;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use League\Fractal\Resource\Primitive;

class UserTransformer extends ParentTransformer
{
    use HashIdTrait;

    protected array $availableIncludes = [
        'roles',
        'permissions',
        'commissionerate',
        'division',
        'circle',
    ];

    protected array $defaultIncludes = [

    ];

    public function includeCommissionerate(User $user): Item|Primitive
    {
        return $this->nullableItem($user->commissionerate, new CategoryTransformer());
    }

    public function includeDivision(User $user): Item|Primitive
    {
        return $this->nullableItem($user->division, new CategoryTransformer());
    }

    public function includeCircle(User $user): Item|Primitive
    {
        return $this->nullableItem($user->circle, new CategoryTransformer());
    }

    public function transform(User $user): array
    {
        $response = [
            'object' => $user->getResourceKey(),
            'id' => $user->getHashedKey(),
            'name' => $user->name,
            'email'=>$user->email,
            'name_bangla' => $user->name,
            'mobile' => $user->mobile,
            'commissionerate_id' => $this->encode($user->commissionerate_id),
            'division_id' => $this->encode($user->division_id),
            'circle_id' => $this->encode($user->circle_id),
            'designation' => $user->designation,
            'address' => $user->address,
            'photo' => $user->photo,
            'dob' => $user->dob,
            'joining_date' => $user->joining_date,
            'fee_collection_start' => $user->fee_collection_start,
            'verified_at' => $user->verified_at
//            'email_verified_at' => $user->email_verified_at,
//            'gender' => $user->gender,
//            'birth' => $user->birth,
        ];

        return $this->ifAdmin([
            'real_id' => $user->id,
            'created_at' => $user->created_at,
            'updated_at' => $user->updated_at,
            'readable_created_at' => $user->created_at->diffForHumans(),
            'readable_updated_at' => $user->updated_at->diffForHumans(),
        ], $response);
    }

    public function includeRoles(User $user): Collection
    {
        return $this->collection($user->roles, new RoleTransformer());
    }


    public function includePermissions(User $user): Collection
    {
        return $this->collection($user->permissions, new PermissionTransformer());
    }
}
