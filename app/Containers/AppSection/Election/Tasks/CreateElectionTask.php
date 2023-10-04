<?php

namespace App\Containers\AppSection\Election\Tasks;

use App\Containers\AppSection\Election\Data\Repositories\ElectionRepository;
use App\Containers\AppSection\Election\Models\Election;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateElectionTask extends ParentTask
{
    public function __construct(
        protected ElectionRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Election
    {
        try {
            return $this->repository->create($data);
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
