<?php

namespace App\Containers\AppSection\Category\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Category\Data\Repositories\CategoryRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetCategoryHierarchyTask extends ParentTask
{
    public function __construct(
        protected CategoryRepository $repository
    ) {
    }

    /**
     * @throws RepositoryException
     */
    public function run($root_id): mixed
    {
        return $this->repository->getDecendentsHierarchy($root_id);
    }
}
