<?php

namespace App\Containers\AppSection\ElectionCandidateVote\Tasks;

use App\Containers\AppSection\ElectionCandidateVote\Data\Repositories\ElectionCandidateVoteRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DeleteElectionCandidateVoteTask extends ParentTask
{
    public function __construct(
        protected ElectionCandidateVoteRepository $repository
    )
    {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run($voter_id, $election_candidate_id): int
    {
        try {
            return $this->repository->deleteWhere(['voter_id' => $voter_id, 'election_candidate_id' => $election_candidate_id]);
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
