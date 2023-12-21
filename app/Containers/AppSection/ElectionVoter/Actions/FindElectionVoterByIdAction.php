<?php

namespace App\Containers\AppSection\ElectionVoter\Actions;

use App\Containers\AppSection\ElectionVoter\Models\ElectionVoter;
use App\Containers\AppSection\ElectionVoter\Tasks\FindElectionVoterByIdTask;
use App\Containers\AppSection\ElectionVoter\UI\API\Requests\FindElectionVoterByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindElectionVoterByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindElectionVoterByIdRequest $request): ElectionVoter
    {
        return app(FindElectionVoterByIdTask::class)->run($request->id);
    }
}
