<?php

namespace App\Containers\AppSection\File\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\File\Data\Repositories\FileRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class ListFilesTask extends ParentTask
{
    public function __construct(
        private readonly FileRepository $repository,
    )
    {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        return $this->repository->addRequestCriteria(['owner_id'])->paginate();
    }
}
