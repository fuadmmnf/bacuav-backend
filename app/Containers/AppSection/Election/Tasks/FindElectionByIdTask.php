<?php

namespace App\Containers\AppSection\Election\Tasks;

use App\Containers\AppSection\Election\Data\Repositories\ElectionRepository;
use App\Containers\AppSection\Election\Models\Election;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindElectionByIdTask extends ParentTask
{
    public function __construct(
        protected ElectionRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Election
    {
        try {
            return $this->repository->find($id);
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
