<?php

namespace App\Containers\AppSection\ElectionCandidateVote\Actions;

use App\Containers\AppSection\ElectionCandidateVote\Models\ElectionCandidateVote;
use App\Containers\AppSection\ElectionCandidateVote\Tasks\FindElectionCandidateVoteByIdTask;
use App\Containers\AppSection\ElectionCandidateVote\UI\API\Requests\FindElectionCandidateVoteByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindElectionCandidateVoteByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindElectionCandidateVoteByIdRequest $request): ElectionCandidateVote
    {
        return app(FindElectionCandidateVoteByIdTask::class)->run($request->id);
    }
}
