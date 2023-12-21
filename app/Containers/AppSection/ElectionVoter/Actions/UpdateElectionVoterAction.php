<?php

namespace App\Containers\AppSection\ElectionVoter\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\ElectionVoter\Models\ElectionVoter;
use App\Containers\AppSection\ElectionVoter\Tasks\UpdateElectionVoterTask;
use App\Containers\AppSection\ElectionVoter\UI\API\Requests\UpdateElectionVoterRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateElectionVoterAction extends ParentAction
{
    /**
     * @param UpdateElectionVoterRequest $request
     * @return ElectionVoter
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateElectionVoterRequest $request): ElectionVoter
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(UpdateElectionVoterTask::class)->run($data, $request->id);
    }
}
