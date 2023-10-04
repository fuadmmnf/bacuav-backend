<?php

namespace App\Containers\AppSection\MonthlyPayment\Tasks;

use App\Containers\AppSection\MonthlyPayment\Data\Repositories\MonthlyPaymentRepository;
use App\Containers\AppSection\MonthlyPayment\Models\MonthlyPayment;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateMonthlyPaymentTask extends ParentTask
{
    public function __construct(
        protected MonthlyPaymentRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): MonthlyPayment
    {
        try {
            return $this->repository->create($data);
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
