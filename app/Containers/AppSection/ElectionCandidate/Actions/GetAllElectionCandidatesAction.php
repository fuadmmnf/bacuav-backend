<?php

namespace App\Containers\AppSection\ElectionCandidate\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\ElectionCandidate\Tasks\GetAllElectionCandidatesTask;
use App\Containers\AppSection\ElectionCandidate\UI\API\Requests\GetAllElectionCandidatesRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllElectionCandidatesAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllElectionCandidatesRequest $request): mixed
    {
        return app(GetAllElectionCandidatesTask::class)->run();
    }
}
