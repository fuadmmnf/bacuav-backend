<?php

namespace App\Containers\AppSection\Committee\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Committee\Tasks\GetAllCommitteesTask;
use App\Containers\AppSection\Committee\UI\API\Requests\GetAllCommitteesRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllCommitteesAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllCommitteesRequest $request): mixed
    {
        return app(GetAllCommitteesTask::class)->run();
    }
}
