<?php

namespace App\Containers\AppSection\CommitteeMember\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class CommitteeMemberRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'committee_id' => '=',
        'name' => 'like',
    ];
}
