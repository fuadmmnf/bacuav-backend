<?php

namespace App\Containers\AppSection\CommitteeMember\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\CommitteeMember\Tasks\GetAllCommitteeMembersTask;
use App\Containers\AppSection\CommitteeMember\UI\API\Requests\GetAllCommitteeMembersRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllCommitteeMembersAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllCommitteeMembersRequest $request): mixed
    {
        return app(GetAllCommitteeMembersTask::class)->addRequestCriteria(null, ['committee_id'])->run();
    }
}
