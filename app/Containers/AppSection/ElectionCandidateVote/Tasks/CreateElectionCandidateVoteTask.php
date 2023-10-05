<?php

namespace App\Containers\AppSection\ElectionCandidateVote\Tasks;

use App\Containers\AppSection\ElectionCandidateVote\Data\Repositories\ElectionCandidateVoteRepository;
use App\Containers\AppSection\ElectionCandidateVote\Models\ElectionCandidateVote;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateElectionCandidateVoteTask extends ParentTask
{
    public function __construct(
        protected ElectionCandidateVoteRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): ElectionCandidateVote
    {
        try {
            return $this->repository->create($data);
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
