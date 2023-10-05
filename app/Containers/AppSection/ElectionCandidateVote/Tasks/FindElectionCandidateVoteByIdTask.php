<?php

namespace App\Containers\AppSection\ElectionCandidateVote\Tasks;

use App\Containers\AppSection\ElectionCandidateVote\Data\Repositories\ElectionCandidateVoteRepository;
use App\Containers\AppSection\ElectionCandidateVote\Models\ElectionCandidateVote;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindElectionCandidateVoteByIdTask extends ParentTask
{
    public function __construct(
        protected ElectionCandidateVoteRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): ElectionCandidateVote
    {
        try {
            return $this->repository->find($id);
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
