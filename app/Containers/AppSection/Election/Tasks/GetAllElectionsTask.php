<?php

namespace App\Containers\AppSection\Election\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Election\Data\Repositories\ElectionRepository;
use App\Ship\Criterias\IsNullCriteria;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllElectionsTask extends ParentTask
{
    public function __construct(
        protected ElectionRepository $repository
    )
    {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        $this->repository->pushCriteria(new IsNullCriteria('parent_id'));
        return $this->addRequestCriteria()->repository->paginate();
    }
}
