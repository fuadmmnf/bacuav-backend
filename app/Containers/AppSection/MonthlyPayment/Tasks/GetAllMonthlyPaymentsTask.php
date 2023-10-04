<?php

namespace App\Containers\AppSection\MonthlyPayment\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\MonthlyPayment\Data\Repositories\MonthlyPaymentRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllMonthlyPaymentsTask extends ParentTask
{
    public function __construct(
        protected MonthlyPaymentRepository $repository
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        return $this->addRequestCriteria()->repository->paginate();
    }
}
