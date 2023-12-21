<?php

namespace App\Containers\AppSection\ElectionVoter\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\ElectionVoter\Models\ElectionVoter;
use App\Containers\AppSection\ElectionVoter\Tasks\CreateElectionVoterTask;
use App\Containers\AppSection\ElectionVoter\UI\API\Requests\CreateElectionVoterRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateElectionVoterAction extends ParentAction
{
    /**
     * @param CreateElectionVoterRequest $request
     * @return ElectionVoter
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateElectionVoterRequest $request): ElectionVoter
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'election_id',
            'voter_id',
        ]);
        return app(CreateElectionVoterTask::class)->run($data);
    }
}
