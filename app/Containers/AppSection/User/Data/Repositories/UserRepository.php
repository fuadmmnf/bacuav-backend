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
        'is_verified' => '=',
        'address' => '=',
        'commissionerate' => '=',
        'division' => '=',
        'circle' => '=',
        'id' => '=',
//        'role.name' => '=',
        'roles.name' => '=',
    ];

    public function model(): string
    {
        return config('auth.providers.users.model');
    }
}
