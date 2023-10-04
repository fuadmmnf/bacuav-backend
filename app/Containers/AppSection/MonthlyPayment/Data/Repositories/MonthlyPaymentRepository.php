<?php

namespace App\Containers\AppSection\MonthlyPayment\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class MonthlyPaymentRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
