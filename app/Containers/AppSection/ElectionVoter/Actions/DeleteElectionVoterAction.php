<?php

namespace App\Containers\AppSection\ElectionVoter\Actions;

use App\Containers\AppSection\ElectionVoter\Tasks\DeleteElectionVoterTask;
use App\Containers\AppSection\ElectionVoter\UI\API\Requests\DeleteElectionVoterRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteElectionVoterAction extends ParentAction
{
    /**
     * @param DeleteElectionVoterRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteElectionVoterRequest $request): int
    {
        return app(DeleteElectionVoterTask::class)->run($request->id);
    }
}
