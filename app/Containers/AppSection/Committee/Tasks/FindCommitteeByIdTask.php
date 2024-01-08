<?php

namespace App\Containers\AppSection\Committee\Tasks;

use App\Containers\AppSection\Committee\Data\Repositories\CommitteeRepository;
use App\Containers\AppSection\Committee\Models\Committee;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindCommitteeByIdTask extends ParentTask
{
    public function __construct(
        protected CommitteeRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Committee
    {
        try {
            return $this->repository->find($id);
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
