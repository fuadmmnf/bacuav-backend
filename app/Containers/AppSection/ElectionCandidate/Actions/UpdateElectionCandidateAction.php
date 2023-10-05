<?php

namespace App\Containers\AppSection\ElectionCandidate\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\ElectionCandidate\Models\ElectionCandidate;
use App\Containers\AppSection\ElectionCandidate\Tasks\UpdateElectionCandidateTask;
use App\Containers\AppSection\ElectionCandidate\UI\API\Requests\UpdateElectionCandidateRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateElectionCandidateAction extends ParentAction
{
    /**
     * @param UpdateElectionCandidateRequest $request
     * @return ElectionCandidate
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateElectionCandidateRequest $request): ElectionCandidate
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(UpdateElectionCandidateTask::class)->run($data, $request->id);
    }
}
