<?php

namespace App\Containers\AppSection\User\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class UserRepository extends ParentRepository
{
    protected $fieldSearchable = [
        'member_id' => 'like',
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
        'member_type' => '=',
        'id' => '=',
//        'role.name' => '=',
        'roles.name' => '=',
        'blood_group' => 'in',
        'educational_qualification' => 'in',
        'last_education_institution' => 'like',
    ];
    protected ?bool $allowDisablePagination = true;

    public function model(): string
    {
        return config('auth.providers.users.model');
    }
}
