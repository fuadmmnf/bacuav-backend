<?php

namespace App\Containers\AppSection\ElectionCandidateVote\Tasks;

use App\Containers\AppSection\ElectionCandidateVote\Data\Repositories\ElectionCandidateVoteRepository;
use App\Containers\AppSection\ElectionCandidateVote\Models\ElectionCandidateVote;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateElectionCandidateVoteTask extends ParentTask
{
    public function __construct(
        protected ElectionCandidateVoteRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): ElectionCandidateVote
    {
        try {
            return $this->repository->update($data, $id);
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
