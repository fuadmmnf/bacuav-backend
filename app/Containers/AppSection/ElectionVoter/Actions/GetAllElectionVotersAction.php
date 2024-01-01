<?php

namespace App\Containers\AppSection\ElectionVoter\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\ElectionVoter\Tasks\GetAllElectionVotersTask;
use App\Containers\AppSection\ElectionVoter\UI\API\Requests\GetAllElectionVotersRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllElectionVotersAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllElectionVotersRequest $request): mixed
    {
        return app(GetAllElectionVotersTask::class)->addRequestCriteria(null, ['election_id', 'voter_id'])->run();
    }
}
