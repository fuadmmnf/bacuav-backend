<?php

namespace App\Containers\AppSection\MonthlyPayment\Tasks;

use App\Containers\AppSection\MonthlyPayment\Data\Repositories\MonthlyPaymentRepository;
use App\Containers\AppSection\MonthlyPayment\Models\MonthlyPayment;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindMonthlyPaymentByIdTask extends ParentTask
{
    public function __construct(
        protected MonthlyPaymentRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): MonthlyPayment
    {
        try {
            return $this->repository->find($id);
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
