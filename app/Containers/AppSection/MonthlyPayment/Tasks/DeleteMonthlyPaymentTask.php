<?php

namespace App\Containers\AppSection\MonthlyPayment\Tasks;

use App\Containers\AppSection\MonthlyPayment\Data\Repositories\MonthlyPaymentRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DeleteMonthlyPaymentTask extends ParentTask
{
    public function __construct(
        protected MonthlyPaymentRepository $repository
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run($id): int
    {
        try {
            return $this->repository->delete($id);
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
