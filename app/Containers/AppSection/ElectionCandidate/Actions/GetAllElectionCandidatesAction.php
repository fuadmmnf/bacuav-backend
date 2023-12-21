<?php

namespace App\Containers\AppSection\ElectionCandidate\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Election\Tasks\FindElectionByIdTask;
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
        $election = app(FindElectionByIdTask::class)->run($request->id);
        return app(GetAllElectionCandidatesTask::class)->run($election, include_votes_count: $election->status == "published" || $request->user()->hasAdminRole());
    }
}
