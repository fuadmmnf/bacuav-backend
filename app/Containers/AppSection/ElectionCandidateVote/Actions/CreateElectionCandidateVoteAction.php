<?php

namespace App\Containers\AppSection\ElectionCandidateVote\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\ElectionCandidateVote\Models\ElectionCandidateVote;
use App\Containers\AppSection\ElectionCandidateVote\Tasks\CreateElectionCandidateVoteTask;
use App\Containers\AppSection\ElectionCandidateVote\Tasks\DeleteElectionCandidateVoteTask;
use App\Containers\AppSection\ElectionCandidateVote\UI\API\Requests\CreateElectionCandidateVoteRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateElectionCandidateVoteAction extends ParentAction
{
    /**
     * @param CreateElectionCandidateVoteRequest $request
     * @return ElectionCandidateVote
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateElectionCandidateVoteRequest $request): ElectionCandidateVote
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'election_candidate_id',
            'voter_id',
        ]);
        return app(CreateElectionCandidateVoteTask::class)->run($data);
    }
}
