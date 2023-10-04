<?php

namespace App\Containers\AppSection\Transaction\Tasks;

use App\Containers\AppSection\Transaction\Data\Repositories\TransactionRepository;
use App\Containers\AppSection\Transaction\Models\Transaction;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateTransactionTask extends ParentTask
{
    public function __construct(
        protected TransactionRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Transaction
    {
        try {
            return $this->repository->create($data);
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
