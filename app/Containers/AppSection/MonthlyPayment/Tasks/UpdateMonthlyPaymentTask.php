<?php

namespace App\Containers\AppSection\MonthlyPayment\Tasks;

use App\Containers\AppSection\MonthlyPayment\Data\Repositories\MonthlyPaymentRepository;
use App\Containers\AppSection\MonthlyPayment\Models\MonthlyPayment;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateMonthlyPaymentTask extends ParentTask
{
    public function __construct(
        protected MonthlyPaymentRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): MonthlyPayment
    {
        try {
            return $this->repository->update($data, $id);
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
