<?php

namespace App\Containers\AppSection\ElectionCandidate\Actions;

use App\Containers\AppSection\ElectionCandidate\Models\ElectionCandidate;
use App\Containers\AppSection\ElectionCandidate\Tasks\FindElectionCandidateByIdTask;
use App\Containers\AppSection\ElectionCandidate\UI\API\Requests\FindElectionCandidateByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindElectionCandidateByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindElectionCandidateByIdRequest $request): ElectionCandidate
    {
        return app(FindElectionCandidateByIdTask::class)->run($request->id);
    }
}
