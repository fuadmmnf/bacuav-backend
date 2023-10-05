<?php

namespace App\Containers\AppSection\ElectionCandidateVote\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\ElectionCandidateVote\Data\Repositories\ElectionCandidateVoteRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllElectionCandidateVotesTask extends ParentTask
{
    public function __construct(
        protected ElectionCandidateVoteRepository $repository
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        return $this->addRequestCriteria()->repository->paginate();
    }
}
