<?php

namespace App\Containers\AppSection\ElectionCandidateVote\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\ElectionCandidateVote\Models\ElectionCandidateVote;
use App\Containers\AppSection\ElectionCandidateVote\Tasks\UpdateElectionCandidateVoteTask;
use App\Containers\AppSection\ElectionCandidateVote\UI\API\Requests\UpdateElectionCandidateVoteRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateElectionCandidateVoteAction extends ParentAction
{
    /**
     * @param UpdateElectionCandidateVoteRequest $request
     * @return ElectionCandidateVote
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateElectionCandidateVoteRequest $request): ElectionCandidateVote
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(UpdateElectionCandidateVoteTask::class)->run($data, $request->id);
    }
}
