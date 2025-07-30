<?php

namespace App\Containers\AppSection\File\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\File\Tasks\ListFilesTask;
use App\Containers\AppSection\File\UI\API\Requests\ListFilesRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class ListFilesAction extends ParentAction
{
    public function __construct(
        private readonly ListFilesTask $listFilesTask,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(ListFilesRequest $request): mixed
    {
        return $this->listFilesTask->run();
    }
}
