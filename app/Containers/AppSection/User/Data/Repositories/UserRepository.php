<?php

namespace App\Containers\AppSection\User\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class UserRepository extends ParentRepository
{
    protected $fieldSearchable = [
        'name' => 'like',
        'name_bangla' => 'like',
        'mobile' => 'like',
        'email' => 'like',
        'designation' => '=',
        'verified_at' => '!=',
        'address' => '=',
        'commissionerate_id' => '=',
        'division_id' => '=',
        'circle_id' => '=',
        'district_id' => '=',
        'id' => '=',
//        'role.name' => '=',
        'roles.name' => '=',
    ];
    protected ?bool $allowDisablePagination = true;

    public function model(): string
    {
        return config('auth.providers.users.model');
    }
}
