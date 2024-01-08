<?php

namespace App\Containers\AppSection\Committee\Tasks;

use App\Containers\AppSection\Committee\Data\Repositories\CommitteeRepository;
use App\Containers\AppSection\Committee\Models\Committee;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateCommitteeTask extends ParentTask
{
    public function __construct(
        protected CommitteeRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Committee
    {
        try {
            return $this->repository->create($data);
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
