<?php

namespace App\Containers\AppSection\ElectionCandidateVote\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\ElectionCandidateVote\Tasks\GetAllElectionCandidateVotesTask;
use App\Containers\AppSection\ElectionCandidateVote\UI\API\Requests\GetAllElectionCandidateVotesRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllElectionCandidateVotesAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllElectionCandidateVotesRequest $request): mixed
    {
        return app(GetAllElectionCandidateVotesTask::class)->run();
    }
}
