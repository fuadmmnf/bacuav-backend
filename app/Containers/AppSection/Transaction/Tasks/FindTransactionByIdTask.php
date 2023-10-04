<?php

namespace App\Containers\AppSection\Transaction\Tasks;

use App\Containers\AppSection\Transaction\Data\Repositories\TransactionRepository;
use App\Containers\AppSection\Transaction\Models\Transaction;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindTransactionByIdTask extends ParentTask
{
    public function __construct(
        protected TransactionRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Transaction
    {
        try {
            return $this->repository->find($id);
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
