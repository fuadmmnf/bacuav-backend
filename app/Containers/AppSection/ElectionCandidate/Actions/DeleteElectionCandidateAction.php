<?php

namespace App\Containers\AppSection\ElectionCandidate\Actions;

use App\Containers\AppSection\ElectionCandidate\Tasks\DeleteElectionCandidateTask;
use App\Containers\AppSection\ElectionCandidate\UI\API\Requests\DeleteElectionCandidateRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteElectionCandidateAction extends ParentAction
{
    /**
     * @param DeleteElectionCandidateRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteElectionCandidateRequest $request): int
    {
        return app(DeleteElectionCandidateTask::class)->run($request->id);
    }
}
