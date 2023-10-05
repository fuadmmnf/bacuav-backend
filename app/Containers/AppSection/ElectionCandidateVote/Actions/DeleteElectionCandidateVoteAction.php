<?php

namespace App\Containers\AppSection\ElectionCandidateVote\Actions;

use App\Containers\AppSection\ElectionCandidateVote\Tasks\DeleteElectionCandidateVoteTask;
use App\Containers\AppSection\ElectionCandidateVote\UI\API\Requests\DeleteElectionCandidateVoteRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteElectionCandidateVoteAction extends ParentAction
{
    /**
     * @param DeleteElectionCandidateVoteRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteElectionCandidateVoteRequest $request): int
    {
        return app(DeleteElectionCandidateVoteTask::class)->run($request->id);
    }
}
