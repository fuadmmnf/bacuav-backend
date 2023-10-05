<?php

namespace App\Containers\AppSection\ElectionCandidate\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\ElectionCandidate\Models\ElectionCandidate;
use App\Containers\AppSection\ElectionCandidate\Tasks\CreateElectionCandidateTask;
use App\Containers\AppSection\ElectionCandidate\UI\API\Requests\CreateElectionCandidateRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateElectionCandidateAction extends ParentAction
{
    /**
     * @param CreateElectionCandidateRequest $request
     * @return ElectionCandidate
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateElectionCandidateRequest $request): ElectionCandidate
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(CreateElectionCandidateTask::class)->run($data);
    }
}
