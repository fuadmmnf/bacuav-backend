<?php

namespace App\Containers\AppSection\Otp\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class OtpRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
