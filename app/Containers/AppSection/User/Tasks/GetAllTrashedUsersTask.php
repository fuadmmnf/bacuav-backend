<?php

namespace App\Containers\AppSection\User\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\User\Data\Repositories\UserRepository;
use App\Ship\Criterias\OnlyTrashedCriteria;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllTrashedUsersTask extends ParentTask
{
    public function __construct(
        protected readonly UserRepository $repository
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        $this->repository->pushCriteria(new OnlyTrashedCriteria());
        return $this->addRequestCriteria()->repository->paginate();
    }
}
