<?php

namespace App\Containers\AppSection\ElectionCandidate\Tasks;

use App\Containers\AppSection\ElectionCandidate\Data\Repositories\ElectionCandidateRepository;
use App\Containers\AppSection\ElectionCandidate\Models\ElectionCandidate;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindElectionCandidateByIdTask extends ParentTask
{
    public function __construct(
        protected ElectionCandidateRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): ElectionCandidate
    {
        try {
            return $this->repository->find($id);
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
