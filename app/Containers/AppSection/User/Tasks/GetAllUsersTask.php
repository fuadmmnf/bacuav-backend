<?php

namespace App\Containers\AppSection\User\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\User\Data\Repositories\UserRepository;
use App\Ship\Criterias\IsNullCriteria;
use App\Ship\Criterias\NotNullCriteria;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllUsersTask extends ParentTask
{
    public function __construct(
        protected readonly UserRepository $repository
    )
    {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run($onlyVerified): mixed
    {
        $this->repository->pushCriteria($onlyVerified ? (new NotNullCriteria('verified_at')) : (new IsNullCriteria('verified_at')));

        return $this->addRequestCriteria()->repository->paginate();
    }
}
