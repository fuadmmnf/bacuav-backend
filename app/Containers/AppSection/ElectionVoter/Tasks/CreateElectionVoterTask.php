<?php

namespace App\Containers\AppSection\ElectionVoter\Tasks;

use App\Containers\AppSection\ElectionVoter\Data\Repositories\ElectionVoterRepository;
use App\Containers\AppSection\ElectionVoter\Models\ElectionVoter;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateElectionVoterTask extends ParentTask
{
    public function __construct(
        protected ElectionVoterRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): ElectionVoter
    {
        try {
            return $this->repository->create($data);
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
