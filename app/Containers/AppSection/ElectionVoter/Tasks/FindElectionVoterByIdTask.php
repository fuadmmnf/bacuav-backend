<?php

namespace App\Containers\AppSection\ElectionVoter\Tasks;

use App\Containers\AppSection\ElectionVoter\Data\Repositories\ElectionVoterRepository;
use App\Containers\AppSection\ElectionVoter\Models\ElectionVoter;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindElectionVoterByIdTask extends ParentTask
{
    public function __construct(
        protected ElectionVoterRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): ElectionVoter
    {
        try {
            return $this->repository->find($id);
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
